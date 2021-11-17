# shorturl

php で動作する短縮 url メーカーです<br>
ドメインを指定できるのが特徴です<br>
[短.net](https://xn--s7y./ "短.net")<br>

# Installation

config.php に データベースの情報を入力して Nginx に適切な Config を指定してください<br>
以下はサンプルです<br>

```Nginx conf
server {
    server_name  ~^(?<subhost>.+)\.example\.com$;
    return       302 https://example.com/?subhost=$subhost;
    listen 443 ssl;
}
server {
    return 301 https://$host$request_uri;
    server_name *.example.com;
    listen 80;
    return 404;
}

```

# License

shorturl is under MIT License
