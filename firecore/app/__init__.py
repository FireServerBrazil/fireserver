import os
#Import flask and template operators
from flask import Flask, render_template

#Import SQLAlchemy
from flask.ext.sqlalchemy import SQLAlchemy

#Import HTTPBasicAuth
from flask.ext.httpauth import HTTPBasicAuth

# Define the WSGI application object
app = Flask(__name__)

# Configurations
app.config.from_object('config')

# Define the database object which is imported
# by modules and controllers
db = SQLAlchemy(app)

#Define object for intercept and authenticate all requests
httpauth = HTTPBasicAuth()

# Sample HTTP error handling
@app.errorhandler(404)
def not_found(error):
    return render_template('404.html'), 404

# Import a module / component using its blueprint handler variable (mod_auth)
from app.mod_auth.controllers import mod_auth as auth_module
from app.mod_task.controllers import mod_tasks as task_module
# Register blueprint(s)
app.register_blueprint(auth_module)
app.register_blueprint(task_module)

# Build the database:
# This will create the database file using SQLAlchemy
if not os.path.exists(os.path.join(app.config['BASE_DIR'], 'db/fireserver.sqlite')):
   db.create_all()
