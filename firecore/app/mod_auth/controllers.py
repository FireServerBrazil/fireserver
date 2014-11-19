# Import flask dependencies
from flask import Blueprint, request, jsonify, render_template, \
                  flash, g, session, redirect, url_for, abort
# Import password / encryption helper tools
from werkzeug import check_password_hash, generate_password_hash
# Import the database object from the main app module
from app import db
#Import decorator for implement authorized requests
from app import httpauth
#Import app for access config class
from app import app
#Import lib for encrypt, dencrypt and check passwords
from passlib.apps import custom_app_context as pwd_context
#Import for work with json 
from itsdangerous import (TimedJSONWebSignatureSerializer
                          as Serializer, BadSignature, SignatureExpired)
# Import module forms
from app.mod_auth.forms import LoginForm
# Import module models (i.e. User)
from app.mod_auth.models import User

import json
# Define the blueprint: 'auth', set its url prefix: app.url/auth
mod_auth = Blueprint('auth', __name__, url_prefix='/auth')

#Implementation of methods 


#Method for encrypt password
def hash_password(objUser, password):
    objUser.password = pwd_context.encrypt(str(password))

#Method for validation password	
def local_verify_password(objUser, password):
    return pwd.verify(str(password), objUser.password)

def generate_auth_token(user, expiration=600):
    s = Serializer(app.config['SECRET_KEY'], expires_in=expiration)
    return s.dumps({'id': user.id})

def verify_auth_token(token):
    s = Serializer(app.config['SECRET_KEY'])
    try:
        data = s.loads(token)
    except SignatureExpired:
        return None
    except BadSignature:
        return None
    user = User.query.get(data['id'])
    return user

@httpauth.verify_password
def verify_password(username_or_token_or_email, password):
    # first try to authenticate by token
    user = verify_auth_token(username_or_token_or_email)
    if not user:
        # try to authenticate with username/password
        user = User.query.filter_by(nickname=username_or_token_or_email).first()
        if not user:
            user = User.query.filter_by(email=username_or_token_or_email).first()
            if not user or not local_verify_password(user, password):
                return False
    g.user = user
    return True

@mod_auth.route('/api/login', methods=['PUT'])
def login():
    username_or_email = request.json.get('username')
    password = request.json.get('password')
    user = User.query.filter_by(nickname=username_or_email).first()
    if not user:
        user = User.query.filter_by(email=username_or_email).first()
        if not user or not local_verify_password(user, password):
            return jsonify({'message' : 'Autentication failed by username and password'})
    g.user = user
    token = g.user.generate_auth_token(600)
    return jsonify({'token': token.decode('ascii'), 'duration': 600})

#  Methods for User Crud

# List All Users
@mod_auth.route('/api/users/list/', methods=['GET'])
#@httpauth.login_required
def list_users():
    queryAux = db.session.query("id", "name", "nickname", "email", "status", "role", "date_created", "date_modified").select_from(User)
    queryAux = queryAux.order_by(User.name).all()  	
    return json.dumps([row._asdict() for row in queryAux]) 

# Get User by ID	
@mod_auth.route('/api/user/<int:idUser>', methods=['GET'])
#@httpauth.login_required
def get_user(idUser):
    user = User.query.filter_by(id=idUser).one()
    return  jsonify({'id': str(user.id), 'name' : user.name, 'nickname' : user.nickname, 'email' :  user.email, 'status' : str(user.status), 'role' : str(user.role), 'date_created' : user.date_created.strftime("%d/%m/%Y %H:%M:%S"), 'date_modified' : user.date_modified.strftime("%d/%m/%Y %H:%M:%S")})

# Input new User
@mod_auth.route('/api/newuser', methods=['PUT'])
#@httpauth.login_required
def new_user():
    username = request.json.get('username')
    nickname = request.json.get('nickname')
    password = request.json.get('password')
    email    = request.json.get('email')
    id_role  = request.json.get('role')
    id_state = request.json.get('state')
    user     = User(username, nickname, email, password, id_role, id_state)
    hash_password(user, password)
    db.session.add(user)
    db.session.commit()
    return  jsonify({'id': str(user.id), 'name' : user.name, 'nickname' : user.nickname, 'email' :  user.email, 'status' : str(user.status), 'role' : str(user.role), 'date_created' : user.date_created.strftime("%d/%m/%Y %H:%M:%S"), 'date_modified' : user.date_modified.strftime("%d/%m/%Y %H:%M:%S")})

@mod_auth.route('/api/updateuser', methods=['PUT'])
#@httpauth.login_required
def update_user():
    idUser   = request.json.get('user_id')
    username = request.json.get('username')
    nickname = request.json.get('nickname')
    password = request.json.get('password')
    email    = request.json.get('email')
    id_role  = request.json.get('role')
    id_state = request.json.get('state')
    # Get User for update your information
    user = User.query.filter_by(id=idUser).one()
    if not user:
        return jsoninfy({'message' : 'User not found in fireserver'})
    else:
        try:
            user.name = username
            user.nickname = nickname
            user.email = email
            user.role = id_role
            user.status = id_state
            if not password:
                hash_password(user, password)
            db.session.merge(user)
            db.session.commit()
            return  jsonify({'id': str(user.id), 'name' : user.name, 'nickname' : user.nickname, 'email' :  user.email, 'status' : str(user.status), 'role' : str(user.role), 'date_created' : user.date_created.strftime("%d/%m/%Y %H:%M:%S"), 'date_modified' : user.date_modified.strftime("%d/%m/%Y %H:%M:%S")})
        except Exception as e:
            return jsonify({'message' : '{0} - {1}'.format(e.errno, e.strerror)})
 
# Delete  User by ID	
@mod_auth.route('/api/user/delete/<int:idUser>', methods=['GET'])
#@httpauth.login_required
def delete_user(idUser):
    user = User.query.filter_by(id=idUser).one()
    if not user:
        return jsoninfy({'message' : 'User not found in fireserver'})
    else:
        db.session.delete(user)
        db.session.commit()
        return jsonify({'message' : 'User successfully deleted'})
