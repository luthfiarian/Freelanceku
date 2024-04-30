<h1 id="freelanceku" align="center" style="text-align: center;">
<img src="https://i.ibb.co/cNSLB3x/favicon.png" alt="Logo Freelanceku" width="15%" height="20%"><br />
Freelanceku
</h1>
<p align="center">
<small><i>The Best Way to Share Work!</i></small><br />
<small>Freelanceku &copy; 2024</small>
</p>

<hr />

<p style="text-align: justify;">
    <span style="font-size: 30px;"><strong>What is Freelanceku ?</strong></span><br />
    <strong>Freelanceku</strong> is a web application that allows you to share work with others and find partners who are suitable to accompany you in completing projects. You can choose work that matches your skills, interests, and time, and communicate directly with your clients and partners through the chat feature. You can also give and receive feedback to improve the quality of your work. One of the interesting features of <strong>Freelanceku</strong> is payment through a reliable and secure payment gateway. You don’t have to worry about your money being deposited on the platform, because you can withdraw it anytime to your bank account. You can also see your transaction history easily and transparently. <strong>Freelanceku</strong> is a web application that is suitable for you who want to work flexibly and not binding, and expand your network and experience.
</p>

<hr />

<p align="center">
Jump to <br />
<a href="#prerequisite">Pre-requisite</a> • <a href="#installation">Installation</a> • <a href="#configuration">Configuration</a> • <a href="#documentation">Documentation</a> • <a href="#trick">Trick</a> • <a href="#feature">Feature</a> • <a href="#license">License</a>
</p>


<hr />


<h2 id="prerequisite">👀 Pre-requisite</h2>
<p>Make sure you have installed the following list:</p>
    
    PHP Version 8.2.4 - Important
    Node.js
    Composer

<p align="center">
<a href="https://www.php.net">PHP</a> • <a href="https://nodejs.org">Node.js</a> • <a href="https://getcomposer.org">Composer</a>
</p>
<h2 id="installation">👨‍🔧 Installation</h2>
<p>For installation, you can use GIT using the link below</p>

```bash
git clone https://github.com/luthfionumsida/freelanceku.git
```

<p>If you don't have GIT you can download it from the green top right code button or link below</p>

```bash
https://github.com/luthfionumsida/freelanceku/archive/refs/heads/main.zip
```
<p>Install npm and composer package <br /> For Development</p>

```bash
npm install
composer install
```
<p>For Production</p>

```bash
npm install --production
composer install --no-dev
```

<p>List of package</p>

    Midtrans/Midstrans-php  (composer)
    Tailwindcss             (npm)
    Flowbite                (npm)
    Swiper                  (npm)

<p>Location Database</p>

```bash
Docs/databases/freelanceku_site.sql
Docs/databases/freelanceku_user.sql
``` 

<p>Location input.css and output.css (Tailwind CSS)</p>

```bash
Public/src/input.css
Public/dist/css/style.css
``` 
<p>Location PWA</p>

```bash
Public/dist/pwa/{manifest.json, offline.php, img, ext.}
``` 
<p>Location PWA Register Service Worker</p>

```bash
App/Views/Templates/Part/RegisSWPWA.php
``` 
<h2 id="configuration">🔧 Configuration</h2>
<p>For first time installation, you can configuration file in bellow</p>
<p>1. Host - To change the site address</p>

```bash
App/Config/Host.php
```
<p>2. Database - Configure the database server connection to your site</p>

```bash
App/Config/Database.php
```
<p>3. Api - Configure an API connection to your site</p>

```bash
App/Config/Api.php
```
<p>4. Admin - Configure admin key to register new admin (You can configure it as you like)</p>

```bash
App/Config/Admin.php
```
<p>5. Midtrans - Configure your midtrans account for use on your site</p>

```bash
App/Config/Mitrans.php
```
<p>6. Webhook - Create account as admin for use receive notification from midtrans</p>

```bash
App/Config/Webhook.php
```
<h2 id="documentation">📄 Documentation</h2>
<h3>Admin User</h3>

```bash
Docs/admin/admin.pdf
``` 
<h3>Freelance User</h3>

```bash
Docs/client/freelance.pdf
``` 

<h3>Full Documentation </h3>

```bash
Docs/freelanceku_full_documentation.pdf
``` 

<h3>Documentation API</h3>

```bash
https://github.com/rayzio-jax/freelance-api
``` 
<h3>Documentation Midtrans API</h3>
<p>Full Documentation Midtrans API</p>

```bash
https://docs.midtrans.com/
``` 
<p>Payment trial in sandbox / testing mode</p>

```bash
https://simulator.sandbox.midtrans.com/
``` 
<h3>Framework</h3>

```bash
https://tailwindcss.com
```
<h2 id="trick">🤫 Trick</h2>
<h3>Register as Admin</h3>
<p>Register as new admin from debug mode (app status must be development)</p>
<p align="center"><img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGhybjlkM2p1aW1yM2x6Mnd1ajVocHk3OHp5ejBhejRlYWdoMWczNCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/TdOWU941bxg5z3CpDY/giphy.gif" width="75%" alt="Register as admin from debug mode" /></p>
<p>Register as new admin from url / method GET (var portal-admin) and value is Admin key (you can see in file <a href="#configuration">Admin.php</a>) For example:</p>

```bash
http://{your_host}/freelanceku/?portal-admin=adminKey
``` 

<p>If you have input the URL above, the page will automatically reload / go to the home page, then click on the register button</p>

<h3>Webhook / HTTP(S) Notification Midtrans</h3>
<p style="text-align: justify;">If you use webhooks, use port forwarding or local tunneling software to receive notifications from Midtrans (<strong>If you have a website that has integrated domain and SSL, it is highly recommended 👍</strong>). Make sure the software is free from "Visit Site" prompts or pages that are harmful to web browsers. Software suggestions:</p>
<p align="center">
<a href="https://serveo.net/">Serveo</a> • <a href="https://localhost.run/">localhost.run</a> • <a href="https://www.cloudflare.com/products/tunnel/">Cloudflare Tunnel</a>
</p>
<p style="text-align: justify;">Don't forget to configure your Midtrans account (on the Midtrans right navigation, click integration and click configuration), fill in the gray box image below according to the complete URL of your website:</p>
<p align="center"><img src="https://i.ibb.co/jDqmsTY/webhook.png" width="75%" alt="Webhook Configuration Midtrans" /></p>
<p>Example of the URL to be filled in</p>

```bash
http://{your_host}/freelanceku/transaction/
```
<p>The message of failure to receive notification from Midtrans will be stored in the freelanceku_site table site_webhook database</p>
<h2 id="feature">🌟 Feature</h2>

- Freelance users share work with up to 3 partners
- Create unlimited works
- Freelance User Monitoring System (For Admin)
- Join unlimited works (for partners)
- Use Payment gateway for payment after job completion
- There is no change in account to become a partner/employer
- Debug Mode in Development (for Developer)
- Built in PWA
- Midtrans Webhook

<h2>⚠️ License</h2>

Distributed under the [MIT](https://choosealicense.com/licenses/mit/) License. See [LICENSE.txt](https://github.com/luthfionumsida/freelanceku/blob/main/LICENSE) for more information.