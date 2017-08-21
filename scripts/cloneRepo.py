import os, json, sys
with open("./ip.json") as dFile:
    data = json.load(dFile)
    HOST = data["ip"]["host"]
    USER = data["ip"]["user"]
    PASS = data["ip"]["pass"]
    os.system("git clone ssh://" + USER + "@" + HOST + "/~/Repos/" + sys.argv[1] + ".git ../repos/" + sys.argv[1] + ".git")
