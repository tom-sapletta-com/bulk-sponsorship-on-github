# bulk-sponsorship-on-github
Replace funding settings on all github projects in one time

Requests:
[list.php](http://localhost:8080/list.php)
[replace.php](http://localhost:8080/replace.php)


## on windows

### install environment packages

curl apifunc

sh .apifunc/download

    .apifunc\\download.bat
    sh .apifunc/download

    .apifunc\\delete.bat

### start server
    
    .apiexec\\dev.bat

    sh .apiexec/dev
    





if exist  (folder/folder/.github/FUNDING.yml)

FUNDING.yml
  + create if not exist
  + replace if data are different


List all sponsored projects on disk:

    list.sh

scan all subfolders

    folder/folder/.github/FUNDING.yml
