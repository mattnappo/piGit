import json, os, paramiko, sys

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
        print(data)
        sys.stdout.flush()
Connection("./ip.json")
