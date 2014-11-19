from app.mod_task.models import ManagerPower
from app.mod_task.models import ConfigureSystem 
# Import flask dependencies
from flask import Blueprint, request, jsonify, render_template, \
                  flash, g, session, redirect, url_for, abort
#Import decorator for implement authorized requests
from app import httpauth
#Import app for access config class
from app import app
# Define the blueprint: 'tasks', set its url prefix: app.url/tasks
mod_tasks = Blueprint('tasks', __name__, url_prefix='/tasks')

#Implementation of methods 

# Method for server down
@mod_tasks.route('/serverdown/', methods=['GET'])
def serverdown():
	mgmPower = ManagerPower()
	mgmPower.shutdown()
	return jsonify({'status':'Servidor desligado com sucesso'})	

# Method for server restart
@mod_tasks.route('/restartserver/', methods=['GET'])
def restartserver():
	mgmPower = ManagerPower()
	mgmPower.restart()
	return jsonify({'status':'Servidor reiniciado com sucesso'})	

# Method for get server name
@mod_tasks.route('/servername/', methods=['GET'])
def servername():
	mgmSystem = ConfigureSystem()
	return jsonify({'servername' : mgmSystem.getServerName()})	


# Method get system datetime for server
@mod_tasks.route('/currentdatetime/', methods=['GET'])
def currentdatetime():
	mgmSystem = ConfigureSystem()
	return jsonify({'currentdatetime' : mgmSystem.getDateTime()})	

# Method get system datetime for server
@mod_tasks.route('/changehostname/', methods=['PUT'])
def newhostname():
	hostname = request.json.get('hostname')
	mgmSystem = ConfigureSystem()
	return jsonify({'newhostname' : mgmSystem.setServerName(hostname)})	

# Method set system datetime for server
@mod_tasks.route('/changedatetime/', methods=['PUT'])
def changedatetime():
	newdatetime = request.json.get('newdatetime')
	mgmSystem = ConfigureSystem()
	return jsonify({'currentdatetime' : mgmSystem.setDateTime(newdatetime)})	
