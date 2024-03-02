<h1 id="Freelanceku" align="center" style="text-align: center;">
<img src="https://i.ibb.co/cNSLB3x/favicon.png" alt="Logo Freelanceku" width="15%" height="20%"><br />
Freelanceku
</h1>
<p align="center">
<small><i>The Best Way to Share Work!</i></small><br />
<small>Freelanceku &copy; 2024</small>
</p>

<div style="text-align: center;"><center><hr width="50%" align="center" style="display: inline-block; margin-left: auto; margin-right: auto; width: 50%;" /></center></div>

<p style="text-align: justify;">
    <span style="font-size: 25px;"><strong>What is Freelanceku ?</strong></span><br />
    <strong>Freelanceku</strong> is a web application that allows you to share work with others and find partners who are suitable to accompany you in completing projects. You can choose work that matches your skills, interests, and time, and communicate directly with your clients and partners through the chat feature. You can also give and receive feedback to improve the quality of your work. One of the interesting features of <strong>Freelanceku</strong> is payment through a reliable and secure payment gateway. You don’t have to worry about your money being deposited on the platform, because you can withdraw it anytime to your bank account. You can also see your transaction history easily and transparently. <strong>Freelanceku</strong> is a web application that is suitable for you who want to work flexibly and not binding, and expand your network and experience.
</p>

<div style="text-align: center;"><center><hr width="50%" align="center" style="display: inline-block; margin-left: auto; margin-right: auto; width: 50%;" /></center></div>

<p align="center">

<a herf="#prerequisite">Pre-requisite</a> •
<a herf="#installation">Installation</a> •
<a herf="#configuration">Configuration</a> •
<a herf="#documentation">Documentation</a> •
</p>

<div style="text-align: center;"><center><hr width="50%" align="center" style="display: inline-block; margin-left: auto; margin-right: auto; width: 50%;" /></center></div>


<h2 id="prerequisite">👀 Pre-requisite</h2>
<p>Make sure you have installed the following list:</p>
    
    PHP Version 8.0+ 
    Node.js
    Composer

<h3>Framework</h3>

```bash
https://tailwindcss.com
```

<h2 id="installation">👨‍🔧 Installation</h2>
<p>For installation, you can use GIT using the link below</p>

```bash
git clone https://github.com/luthfionumsida/freelanceku.git
```

<p>If you don't have GIT you can download it from the green top right code button or link below</p>

```bash
https://github.com/luthfionumsida/freelanceku/archive/refs/heads/main.zip
```
<p>Install npm and composer package</p>

```bash
npm install
composer install
```

<p>List of package</p>

    Midtrans/Midstrans-php  (composer)
    Flowbite                (npm)

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
<p>4. Admin - Configure admin key to register new admin</p>

```bash
App/Config/Admin.php
```
<p>5. Midtrans - Configure your midtrans account for use on your site</p>

```bash
App/Config/Mitrans.php
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

<h3>Documentation API</h3>

```bash
https://github.com/rayzio-jax/freelance-api
``` 
<h3>Documentation Midtrans</h3>

```bash
https://docs.midtrans.com/
https://simulator.sandbox.midtrans.com/
``` 

<h2>⚠️ License</h2>

Distributed under the [MIT](https://choosealicense.com/licenses/mit/) License. See [LICENSE.txt](https://github.com/luthfionumsida/freelanceku/blob/main/LICENSE) for more information.