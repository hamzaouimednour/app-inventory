
1. wildcard DNS record so that all subdomains resolve to the same host (IP) address. (Not all DNS providers offer this service DynamicDNS)

# Create wildcard subdomain in xampp localhost

1. add "127.0.0.1 localhost.dev" to :
    Windows 10 – “C:\Windows\System32\drivers\etc\hosts”
    Linux – “/etc/hosts”
2. httpd.conf :
    
    uncomment "LoadModule vhost_alias_module modules/mod_vhost_alias.so"
    
3. conf/extra/httpd-vhosts.conf : 
    <VirtualHost *:80>
        DocumentRoot "/opt/lampp/htdocs/mysite/public"
        ServerName localhost.dev
        ServerAlias *.localhost.dev
        <Directory "/opt/lampp/htdocs/mysite/public">
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>