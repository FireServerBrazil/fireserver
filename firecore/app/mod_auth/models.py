from app import db

# Define a base model for other database tables to inherit
class Base(db.Model):

    __abstract__  = True

    id            = db.Column(db.Integer, primary_key=True)
    date_created  = db.Column(db.DateTime,  default=db.func.current_timestamp())
    date_modified = db.Column(db.DateTime,  default=db.func.current_timestamp(),
                                           onupdate=db.func.current_timestamp())

# Define a User model
class User(Base):

    __tablename__ = 'users'

    # User Name
    name    = db.Column(db.String(128),  nullable=False)

    # Nickname for login
    nickname = db.Column(db.String(128),  nullable=False)

    # Identification Data: email & password
    email    = db.Column(db.String(128),  nullable=False,
                                            unique=True)
    password = db.Column(db.String(192),  nullable=False)

    # Authorisation Data: role & status
    role     = db.Column(db.SmallInteger, nullable=False)
    status   = db.Column(db.SmallInteger, nullable=False)

    # New instance instantiation procedure
    def __init__(self, name, nickname, email, password, role, status):

        self.name     = name
        self.nickname = nickname
        self.email    = email
        self.password = password
        self.role     = role
        self.status   = status

    def __repr__(self):
        return  "{0}".format('{"id" : ' + str(self.id) +', "name" : "'+ self.name + '", "nickname" : ' + self.nickname + ', "email" : "' + self.email + '", "status" : ' + str(self.status) +', "date_created" : "'+ self.date_created.strftime("%d/%m/%Y %H:%M:%S") + '", "date_modified" : "' + self.date_modified.strftime("%d/%m/%Y %H:%M:%S")+'"}')
    
    def dump_datetime(value):
        """Deserialize datetime object into string form for JSON processing."""
        if value is None:
            return None
        return [value.strftime("%dd-%mm-%YYYY"), value.strftime("%H:%M:%S")]
