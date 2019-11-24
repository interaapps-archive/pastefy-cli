# Pastefy-CLI

`pastefy -f file.txt`

Out:
<pre><font color="#8AE234">᮰ Done</font>: Pasted! Here is your link https://pastefy.ga/0c6sDILq</pre>


`Examples`
```
pastefy -c "Hello world" -t "test.txt"

pastefy -f test.txt
```

### Installation `Linux`
```bash
sudo wget https://raw.githubusercontent.com/interaapps/pastefy-cli/master/pastefy
sudo mv pastefy /usr/local/bin/pastefy
sudo chmod 777 /usr/local/bin/pastefy
```
`Information` You can also download the `pastefy` file and use `php pastefy` if you don't want to install it globally. (Also works on Windows and MacOS)

### Options
```
-f · File
-p · Password
-c · contents
-t · title
```