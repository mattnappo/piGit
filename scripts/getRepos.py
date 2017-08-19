import json, os, paramiko

class Connection():
    def __init__(self, conn):
        with open(conn) as dFile:
            data = json.load(dFile)
            self.HOST = data["ip"]["host"]
            self.USER = data["ip"]["user"]
            self.PASS = data["ip"]["pass"]
        self.ssh = paramiko.SSHClient()
        self.ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        self.ssh.connect(self.HOST, username=self.USER, password=self.PASS)
        self.writeRepos()
    def writeRepos(self):
        stdin, stdout, stderr = self.ssh.exec_command("cd Repos; ls")
        repos = stdout.readlines()
        if os.path.isdir("../repos") == False:
            os.mkdir("../repos")
        jsonRepos = []
        for x in repos:
            jsonRepos.append(x[:-5])
        start = '{"repos": ['
        data = ""
        for x in range(len(jsonRepos)):
            if x == 0:
                data = data + '"' + jsonRepos[x] + '"'
            else:
                data = data + "," + '"' + jsonRepos[x] + '"'
        end = ']}'
        data = start + data + end
        if os.path.isfile("../repos/info.json") == True:
            os.remove("../repos/info.json")
        with open("../repos/info.json", "w") as jFile:
            jFile.write(data)
            #json.dump(data, jFile)
conn = Connection("ip.json")
