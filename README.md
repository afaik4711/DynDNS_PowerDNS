# DynDNS_PowerDNS
DynDns Server with PowerDNS / MySQL for IPv4 &amp; IPv6 simultainiously

You need an installed PowerDNS with MySQL Backend.
If you have no DB Setup yet, use the included pdns.sql file.

To add records, please follow the PDNS documentation and choose a low TTL (e.g. 300)
Add another user to the databae with only Update rights to table "records"
This user has to be put to the connect.php.
Also, add your DynDNS Hosts to connect.php to ensure only these records are updated.
You do not want records like ns.<youdomain> or www.<youdomain> updatet.

In your router, use following URL and settings:
UpdateURL (eg FritzBox Custom / Benutzerdefiniert):
https://<yourdomain>/updatedns.php?hostname=<DOMAIN>&ip=<ipaddr>&ip6=<ip6addr>
Domain: dyndns1.<yourdomain>
User: username*
Pass: password*

* I use apache's basic auth for authentication.

