import datetime
import subprocess as cmd
import sys
import os.path

now = (datetime.datetime.now()).strftime("%Y-%m-%d %H:%M:%S")

def commit():
    cmd.run("git add .", check=True, shell=True)
    temp = str(os.path.realpath(sys.argv[0])+"\t\t"+now+"\t\t")
    try:
        cmd.run(str("git commit -m \"MFY "+now+"\""),check=True, shell=True)
        cmd.run("git push -u origin main",check=True, shell=True)
        temp += " Done \n";

    except:
        temp += " Failed \n";

    f = open("C:\\Users\\MFY\\Documents\\GitHub\\HistoryLog.txt", "a")
    f.write(temp)
    f.close()


commit()