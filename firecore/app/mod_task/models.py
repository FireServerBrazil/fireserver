import os
import socket
from time import gmtime, strftime

class ManagerPower(object):
	def restart(self):
		comando = "shutdown -r now"
		os.system(comando)
	def shutdown(self):
		comando = "shutdown -h now"
		os.system(comando)

class ConfigureSystem(object):
	def getServerName(self):
		return socket.gethostname()

	def setServerName(self, servername : str):
		comando = "hostname " +servername
		os.system(comando)
		return socket.gethostname()

	def getDateTime(self):
		data = strftime("%d/%m/%Y %H:%M:%S")
		return str(data)		

	def setDateTime(self, newdatetime : str):
		comando = "date " + newdatetime
		os.system(comando)
		comando = "hwclock --systohc"
		os.system(comando)	
		return self.getDateTime()

class ConfigureNetwork(object):
	def getListNetworkInteface(self):
		return ""
