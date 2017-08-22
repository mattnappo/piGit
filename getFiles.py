import os
files = os.listdir("./Repos/")
start = '{"repos": ['
data = ""
for x in range(len(files)):
    if x == 0:
        data = data + '"' + files[x] + '"'
    else:
        data = data + "," + '"' + files[x] + '"'
end = ']}'
data = start + data + end
open("repos.json", "w").close()
with open("repos.json", "w") as jFile:
    jFile.write(data)
