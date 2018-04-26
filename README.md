<h2>Description</h2>

<p>This simple mvc is still in <b>developing stage</b>.</p>
<p>MVC has few Controllers and Views so it can be used for simple projects.
<p>Before start using the mvc you need to install and update npm and composer.</p>
<p>For database connection parametars use .env file.</p>

<h2>Mvc contains</h2>

<p>1. webpack-mix</p>
<p>This mix you can use for compiling sass files and js files.</p>
<p>scss file is located in assets/css and compiled files are stored in public/css</p>
<h3>Compiling scss files</h3>
<p>For compiling files use <b>nmp run dev</b> or <b>npm run watch</b> command in your terminal</p> 
<p>If you are windows user face problem any problem after runing this commands you should install win-node-env
<h4>Installation</h4>
<p> npm install -g win-node-env</p>
<p>After installation add this script into package.json</p>
<pre>
  <code>
   "scripts": {
    "dev": "NODE_ENV=development webpack --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    
"watch": "NODE_ENV=development webpack --watch --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    
"hot": "NODE_ENV=development webpack-dev-server --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
    
"production": "NODE_ENV=production webpack --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
  },
  </code>
</pre>
<p>2.Blade template</p>
<p>If you like blade template you can use it</p>
<p>3.env file<p>
</p>Configuration file<p> 
<p>4.added autolodaing</p>
 <p>PSR-4</p>
<p>You can change this in composer.json, and use PSR-0 or autloading functions</p>
<h2>Licencse</h2>
MIT
