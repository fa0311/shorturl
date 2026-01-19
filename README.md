> [!NOTE]
> 注意：これは過去の学習記録です。
> 本リポジトリは、私が学習初期（小学生〜中学生）に作成した成果物を、成長の記録として保存・公開しているアーカイブです。
> 当時の環境や理解の範囲で書かれており、現在の私の設計方針・開発プロセス・品質基準を示すものではありません。
> このリポジトリは「当時の状態そのもの」を残すことに意味があるため、修正・改修・削除は行いません。
> 本リポジトリ単体のコードベースから定量的・網羅的な評価を行うことは推奨しません。
> 必要な場合は、GitHubプロフィールの pinned リポジトリ、直近のコミット履歴、OSS貢献など、複数リポジトリを横断して総合的に参照してください。

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
