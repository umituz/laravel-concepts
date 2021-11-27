<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">
    <script src="{{ asset("vendor/scribe/js/theme-default-3.0.2.js") }}"></script>

    <link rel="stylesheet"
          href="//unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script src="//cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script>
        var baseUrl = "http://localhost";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.0.2.js") }}"></script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: June 17 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1>Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authors-module">Authors Module</h1>
    <p>
        
    </p>

            <h2 id="authors-module-GETauthors-create">authors/create</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/authors/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/authors/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IkdyOUZCa001R2pzblJCVmtXUFF3NXc9PSIsInZhbHVlIjoiR1FtUW9tdm8xUEVOc0k1bkRyMG16dTBGbXY4SjdOTm5sRlNRZ1dMZ0V2NkdBaWp3N3J0RGJwU2FlaXFJOGpHc0tJNUNJMjhFK1IyQmlIdzFuNGpWbjI3MnN4dWFuNzc3YSsyKzFUMVB1UHFRVDY5eDNpRWExMWF1cWVOU2wzVWYiLCJtYWMiOiIwYzIzM2I2YjdiN2VlMjJhNjY3YmI4MDVjNTBiY2I5ZDM4Yjk1ODczOWRhMTQwYzdiOGU0ZDNiZTFkZTQ3ODkxIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IlhyYS96T0d3UWZrZ24rWktjQkFTamc9PSIsInZhbHVlIjoiNFZmQ3hvNVkyZEpGc1RDTVNsZGxHOFQrdUdJRUtjOGtGUllJYUZWOHlDRHRSZHAzNFB4NHBSSnpiNnJvVThoYjlieUNoRG1ZTjc1bVFoN3d2OUpSdE5oY0FMaU9xbS80V1ZqZWxyVnFvcUQ1YTRZaE40VmZKbkRSV1FOR3N0eEciLCJtYWMiOiJhYjI3NGRkNGVhYTFiM2ExODRjYWIyMzZkNjUxZTViZjNjNWI4YjgxYzc3OTcyYWJlZThkOTQ5MGZmMzgxY2ZjIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src=&quot;http://localhost/js/app.js&quot; defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;dns-prefetch&quot; href=&quot;//fonts.gstatic.com&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;!-- Styles --&gt;
    &lt;link href=&quot;http://localhost/css/app.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id=&quot;app&quot;&gt;
        &lt;nav class=&quot;navbar navbar-expand-md navbar-light bg-white shadow-sm&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
                &lt;a class=&quot;navbar-brand&quot; href=&quot;http://localhost&quot;&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarSupportedContent&quot; aria-controls=&quot;navbarSupportedContent&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarSupportedContent&quot;&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav mr-auto&quot;&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class=&quot;nav-item&quot;&gt;
                                &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class=&quot;nav-item&quot;&gt;
                                    &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class=&quot;py-4&quot;&gt;
                &lt;div class=&quot;w-2/3 bg-gray-200 mx-auto p-6 shadow&quot;&gt;
        &lt;form autocomplete=&quot;off&quot; action=&quot;/authors&quot; method=&quot;post&quot; class=&quot;flex flex-col items-center&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;            &lt;h1&gt;Add New Author&lt;/h1&gt;
            &lt;div&gt;
                &lt;input type=&quot;text&quot; class=&quot;rounded py-2 px-4 w-64&quot; name=&quot;name&quot; placeholder=&quot;Full Name&quot;&gt;
                            &lt;/div&gt;
            &lt;div class=&quot;pt-4&quot;&gt;
                &lt;input type=&quot;text&quot; class=&quot;rounded py-2 px-4 w-64&quot; name=&quot;birthday&quot; placeholder=&quot;Birthday&quot;&gt;
                            &lt;/div&gt;
            &lt;div class=&quot;pt-4&quot;&gt;
                &lt;button class=&quot;bg-blue-400 text-white rounded py-2 px-4&quot;&gt;Add New Author&lt;/button&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETauthors-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETauthors-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETauthors-create"></code></pre>
</div>
<div id="execution-error-GETauthors-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETauthors-create"></code></pre>
</div>
<form id="form-GETauthors-create" data-method="GET"
      data-path="authors/create"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETauthors-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETauthors-create"
                    onclick="tryItOut('GETauthors-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETauthors-create"
                    onclick="cancelTryOut('GETauthors-create');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETauthors-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>authors/create</code></b>
        </p>
                    </form>

            <h2 id="authors-module-POSTauthors">authors</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/authors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/authors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTauthors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTauthors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTauthors"></code></pre>
</div>
<div id="execution-error-POSTauthors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTauthors"></code></pre>
</div>
<form id="form-POSTauthors" data-method="POST"
      data-path="authors"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTauthors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTauthors"
                    onclick="tryItOut('POSTauthors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTauthors"
                    onclick="cancelTryOut('POSTauthors');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTauthors" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>authors</code></b>
        </p>
                    </form>

        <h1 id="books-module">Books Module</h1>
    <p>
        
    </p>

            <h2 id="books-module-POSTbooks">books</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/books"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTbooks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTbooks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTbooks"></code></pre>
</div>
<div id="execution-error-POSTbooks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTbooks"></code></pre>
</div>
<form id="form-POSTbooks" data-method="POST"
      data-path="books"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTbooks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTbooks"
                    onclick="tryItOut('POSTbooks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTbooks"
                    onclick="cancelTryOut('POSTbooks');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTbooks" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>books</code></b>
        </p>
                    </form>

            <h2 id="books-module-PATCHbooks--book-">books/{book}</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request PATCH \
    "http://localhost/books/11" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/books/11"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PATCHbooks--book-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHbooks--book-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHbooks--book-"></code></pre>
</div>
<div id="execution-error-PATCHbooks--book-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHbooks--book-"></code></pre>
</div>
<form id="form-PATCHbooks--book-" data-method="PATCH"
      data-path="books/{book}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PATCHbooks--book-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHbooks--book-"
                    onclick="tryItOut('PATCHbooks--book-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHbooks--book-"
                    onclick="cancelTryOut('PATCHbooks--book-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHbooks--book-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>books/{book}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>book</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="book" data-endpoint="PATCHbooks--book-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="books-module-DELETEbooks--book-">books/{book}</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request DELETE \
    "http://localhost/books/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/books/14"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEbooks--book-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEbooks--book-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEbooks--book-"></code></pre>
</div>
<div id="execution-error-DELETEbooks--book-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEbooks--book-"></code></pre>
</div>
<form id="form-DELETEbooks--book-" data-method="DELETE"
      data-path="books/{book}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEbooks--book-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEbooks--book-"
                    onclick="tryItOut('DELETEbooks--book-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEbooks--book-"
                    onclick="cancelTryOut('DELETEbooks--book-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEbooks--book-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>books/{book}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>book</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="book" data-endpoint="DELETEbooks--book-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

        <h1 id="checkinbook-module">CheckinBook Module</h1>
    <p>
        
    </p>

            <h2 id="checkinbook-module-POSTcheckin--book-">checkin/{book}</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/checkin/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/checkin/9"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTcheckin--book-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcheckin--book-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcheckin--book-"></code></pre>
</div>
<div id="execution-error-POSTcheckin--book-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcheckin--book-"></code></pre>
</div>
<form id="form-POSTcheckin--book-" data-method="POST"
      data-path="checkin/{book}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTcheckin--book-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcheckin--book-"
                    onclick="tryItOut('POSTcheckin--book-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcheckin--book-"
                    onclick="cancelTryOut('POSTcheckin--book-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcheckin--book-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>checkin/{book}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>book</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="book" data-endpoint="POSTcheckin--book-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

        <h1 id="checkoutbook">CheckoutBook</h1>
    <p>
        
    </p>

            <h2 id="checkoutbook-POSTcheckout--book-">checkout/{book}</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/checkout/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/checkout/7"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTcheckout--book-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcheckout--book-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcheckout--book-"></code></pre>
</div>
<div id="execution-error-POSTcheckout--book-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcheckout--book-"></code></pre>
</div>
<form id="form-POSTcheckout--book-" data-method="POST"
      data-path="checkout/{book}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTcheckout--book-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcheckout--book-"
                    onclick="tryItOut('POSTcheckout--book-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcheckout--book-"
                    onclick="cancelTryOut('POSTcheckout--book-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcheckout--book-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>checkout/{book}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>book</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="book" data-endpoint="POSTcheckout--book-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

        <h1 id="endpoints">Endpoints</h1>
    <p>
        
    </p>

            <h2 id="endpoints-GET_dusk-login--userId---guard--">Login using the given user ID / email.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/_dusk/login/omnis/est" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/_dusk/login/omnis/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlpGUCsxWHFwQThKaWxGOEdZOUxxN0E9PSIsInZhbHVlIjoieEkvbXFQYjlhUzg3WWtqWGhYL2lZbzU3UTljeW9obnd3NDJ1UDV4WVJnUGdiMm16WGxWa0lIR2EydENTTmhabk5lL0RWbnJXU2YxZzl6NEU1T1pIYU4xbFBSKzNkME13bFRNMlFhcGJTWDFObkpjL1FIOWcxMTFadVVjRXI5bDciLCJtYWMiOiJhMWE3NGQyYWU1MjZlZjNiYWEwOGY1OTMzOWQyZmY2NmUyYmJlMTc1OGU2NGQ1MjRmYmY0ODM4MjZiYjgxNDI4In0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IklCbFZFdTlySkRtTlFFSVdEMkltWGc9PSIsInZhbHVlIjoiaWtkSEVaSmlKWkFwckJoUWRPSm5Ma2dZMThIMzk0Z2JteWExMXFzN2hjWjd1ckRUaTNxVzNUUWROVk5lK2tEdWY1akUxVm1MSmkrSGFtNHBPbTYvUEYybHdnWFZjTFlyMytHN3N4ZDVkVkhNMFBQSEJaYUl2SktIRXpHUVRjQ3AiLCJtYWMiOiI2MTEyNjI2ODFkMWNiZWVmYTRlMTVhMmI0YmE2MDVmMGNmNWZlN2RkMmYxZDNmZjVjNjZlYzRjNDdmOGIzNGJjIn0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Auth guard [est] is not defined.&quot;,
    &quot;exception&quot;: &quot;InvalidArgumentException&quot;,
    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
    &quot;line&quot;: 84,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;resolve&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;guard&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php&quot;,
            &quot;line&quot;: 42,
            &quot;function&quot;: &quot;__callStatic&quot;,
            &quot;class&quot;: &quot;Illuminate\\Support\\Facades\\Facade&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;login&quot;,
            &quot;class&quot;: &quot;Laravel\\Dusk\\Http\\Controllers\\UserController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 239,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 196,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 685,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php&quot;,
            &quot;line&quot;: 78,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php&quot;,
            &quot;line&quot;: 49,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\View\\Middleware\\ShareErrorsFromSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;handleStatefulRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php&quot;,
            &quot;line&quot;: 67,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\EncryptCookies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 687,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 628,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 617,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 165,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\barryvdh\\laravel-debugbar\\src\\Middleware\\InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php&quot;,
            &quot;line&quot;: 63,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\fideloper\\proxy\\src\\TrustProxies.php&quot;,
            &quot;line&quot;: 57,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fideloper\\Proxy\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 140,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 109,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 275,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 228,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 322,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 596,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 134,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 974,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}
 </code>
        </pre>
    <div id="execution-results-GET_dusk-login--userId---guard--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_dusk-login--userId---guard--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_dusk-login--userId---guard--"></code></pre>
</div>
<div id="execution-error-GET_dusk-login--userId---guard--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_dusk-login--userId---guard--"></code></pre>
</div>
<form id="form-GET_dusk-login--userId---guard--" data-method="GET"
      data-path="_dusk/login/{userId}/{guard?}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GET_dusk-login--userId---guard--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_dusk-login--userId---guard--"
                    onclick="tryItOut('GET_dusk-login--userId---guard--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_dusk-login--userId---guard--"
                    onclick="cancelTryOut('GET_dusk-login--userId---guard--');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_dusk-login--userId---guard--" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_dusk/login/{userId}/{guard?}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>userId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="userId" data-endpoint="GET_dusk-login--userId---guard--" data-component="url" required  hidden>
<br>
            </p>
                    <p>
                <b><code>guard</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="guard" data-endpoint="GET_dusk-login--userId---guard--" data-component="url"  hidden>
<br>
            </p>
                    </form>

            <h2 id="endpoints-GET_dusk-logout--guard--">Log the user out of the application.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/_dusk/logout/nulla" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/_dusk/logout/nulla"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkJ6dGQzN2M4R0lIRE1XbFJQS09ZL1E9PSIsInZhbHVlIjoiREF1UXRtVUE3dlpzQUEvOEZhdkUvSThEZ0RGcVZadkh3VkgwN1RiaFBwRlA0Mi9qSkkwNGs1eEErSWxJei9jYjNFTG04MDBIV2g5T2JHcFlZZHh0Y2hLTVJTb3pQMjN6ZEFHR01obDJLVk9uZzd3WDV1SE1ZcHhGWVFrM1FsSjAiLCJtYWMiOiI2MWY1N2RmNjBjYWVjMWVkZDJiYjM5NmIyMDAyMTkzNDdmZWI5YmNiMmE1OTRjNDJmMzg5ZDJhZGU4ZjM4MDZmIn0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6ImNJN0trT05meDhaK3VUMUw4b2VzOEE9PSIsInZhbHVlIjoiamtlZkNNellWRzNvVGR0NXArZEl2SWpDSzA0RFh0RmhMcDJoZlRmTk5vQ1M5djVZS3Fvd0hnSEFkZGhzTTBqVkI3MmNJM212QTJwMW1XUE9IeUVJY1RmZXQwSEpYaG43YmJwaVQ5dE5UcTBFS3R2alhBcS83amYyR0pCUHZNYzYiLCJtYWMiOiIyMmQ0NWRlMjgyYmRmNzliNzJlMWRhZDc5YjViYzNjMjE0Y2FkMjE4YTIyNTk2NTgxYzZiMDYyYmY2YTdlNDQ0In0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Auth guard [nulla] is not defined.&quot;,
    &quot;exception&quot;: &quot;InvalidArgumentException&quot;,
    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
    &quot;line&quot;: 84,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;resolve&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;guard&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php&quot;,
            &quot;line&quot;: 59,
            &quot;function&quot;: &quot;__callStatic&quot;,
            &quot;class&quot;: &quot;Illuminate\\Support\\Facades\\Facade&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;logout&quot;,
            &quot;class&quot;: &quot;Laravel\\Dusk\\Http\\Controllers\\UserController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 239,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 196,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 685,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php&quot;,
            &quot;line&quot;: 78,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php&quot;,
            &quot;line&quot;: 49,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\View\\Middleware\\ShareErrorsFromSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;handleStatefulRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php&quot;,
            &quot;line&quot;: 67,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\EncryptCookies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 687,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 628,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 617,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 165,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\barryvdh\\laravel-debugbar\\src\\Middleware\\InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php&quot;,
            &quot;line&quot;: 63,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\fideloper\\proxy\\src\\TrustProxies.php&quot;,
            &quot;line&quot;: 57,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fideloper\\Proxy\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 140,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 109,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 275,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 228,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 322,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 596,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 134,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 974,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}
 </code>
        </pre>
    <div id="execution-results-GET_dusk-logout--guard--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_dusk-logout--guard--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_dusk-logout--guard--"></code></pre>
</div>
<div id="execution-error-GET_dusk-logout--guard--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_dusk-logout--guard--"></code></pre>
</div>
<form id="form-GET_dusk-logout--guard--" data-method="GET"
      data-path="_dusk/logout/{guard?}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GET_dusk-logout--guard--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_dusk-logout--guard--"
                    onclick="tryItOut('GET_dusk-logout--guard--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_dusk-logout--guard--"
                    onclick="cancelTryOut('GET_dusk-logout--guard--');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_dusk-logout--guard--" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_dusk/logout/{guard?}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>guard</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="guard" data-endpoint="GET_dusk-logout--guard--" data-component="url"  hidden>
<br>
            </p>
                    </form>

            <h2 id="endpoints-GET_dusk-user--guard--">Retrieve the authenticated user identifier and class name.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/_dusk/user/doloribus" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/_dusk/user/doloribus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im9PUHphMEZISVVmb1liR1FLTHVzNUE9PSIsInZhbHVlIjoidUdyTGdxYXUxZHJzQ1M2azFBam5PK2h0WVRoNm00eCtzVU1HaElsWE9nelBIZ0hVeFJuY001RlJRRTErT2xuUGE2eUdiTEhaUlBCM2IrMzcrcjcvcit1L1pmZUJjSjVyQ043UTZrcDgrREo2L2oxenZtL2xvYkV1WWg1K3pWTGwiLCJtYWMiOiI5YzJlZTg0NTg3ZmRkZTdiNDI0NWYyMjdhODRlNmFjMTg2MzMxNmRmZmZkZTVkZTk1ZTIzYWJkN2IyNzBiN2FjIn0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6ImhLYjVkKzBQS1g0dlZmeGtOWnVSU1E9PSIsInZhbHVlIjoieW0zNlFvMmQ2dWZKQWtuYlR1ZEcxY3dTNEdwcDVZcGFyZTdhZjhNRXZucFBmTXc0SWFNNjZrZkZBb3AxTG5wekNlRWlWZC9uOXhZQzIzUjhTbFJJRkpvL0ZDeHVaRkpuanBrZU1UQll6ZDJnMWRYVm1XZ3dmeHdDQ0creXNSYm8iLCJtYWMiOiJkMjQ2MmFkYTJkZTE4ZGRlOWU0MWQwZWQwMTcxOTRhYmU4YjZlNjQ2NzRjMjM2NDAzZjJhZDFjYTQwN2FiMjMzIn0%3D; expires=Thu, 17-Jun-2021 15:22:48 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Auth guard [doloribus] is not defined.&quot;,
    &quot;exception&quot;: &quot;InvalidArgumentException&quot;,
    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
    &quot;line&quot;: 84,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;resolve&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;guard&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\AuthManager&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php&quot;,
            &quot;line&quot;: 19,
            &quot;function&quot;: &quot;__callStatic&quot;,
            &quot;class&quot;: &quot;Illuminate\\Support\\Facades\\Facade&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;user&quot;,
            &quot;class&quot;: &quot;Laravel\\Dusk\\Http\\Controllers\\UserController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 239,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 196,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 685,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php&quot;,
            &quot;line&quot;: 78,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php&quot;,
            &quot;line&quot;: 49,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\View\\Middleware\\ShareErrorsFromSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php&quot;,
            &quot;line&quot;: 62,
            &quot;function&quot;: &quot;handleStatefulRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Session\\Middleware\\StartSession&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php&quot;,
            &quot;line&quot;: 67,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Cookie\\Middleware\\EncryptCookies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 687,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 628,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 617,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 165,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\barryvdh\\laravel-debugbar\\src\\Middleware\\InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php&quot;,
            &quot;line&quot;: 63,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\fideloper\\proxy\\src\\TrustProxies.php&quot;,
            &quot;line&quot;: 57,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fideloper\\Proxy\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 140,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 109,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 275,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 228,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 322,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 596,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 134,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 974,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}
 </code>
        </pre>
    <div id="execution-results-GET_dusk-user--guard--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_dusk-user--guard--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_dusk-user--guard--"></code></pre>
</div>
<div id="execution-error-GET_dusk-user--guard--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_dusk-user--guard--"></code></pre>
</div>
<form id="form-GET_dusk-user--guard--" data-method="GET"
      data-path="_dusk/user/{guard?}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GET_dusk-user--guard--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_dusk-user--guard--"
                    onclick="tryItOut('GET_dusk-user--guard--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_dusk-user--guard--"
                    onclick="cancelTryOut('GET_dusk-user--guard--');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_dusk-user--guard--" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_dusk/user/{guard?}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>guard</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="guard" data-endpoint="GET_dusk-user--guard--" data-component="url"  hidden>
<br>
            </p>
                    </form>

            <h2 id="endpoints-GETschematics">schematics</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/schematics" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel Schematics&lt;/title&gt;

    &lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/vendor/schematics/app.css&quot; /&gt;
&lt;/head&gt;
    &lt;body class=&quot;bg-gray-200&quot;&gt;
    
    &lt;script&gt;
        window.Schematics = {
            activeTab: parseInt(localStorage.getItem('schematics-active-tab') || 1),
            config: {&quot;controller-namespace&quot;:null,&quot;form-request-namespace&quot;:&quot;App\\Http\\Requests&quot;,&quot;model&quot;:{&quot;namespace&quot;:&quot;App\\&quot;,&quot;path&quot;:&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app&quot;,&quot;paths&quot;:[&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app&quot;]},&quot;middleware&quot;:null,&quot;auto-migrate&quot;:false,&quot;create&quot;:{&quot;migration&quot;:false,&quot;resource-controller&quot;:false,&quot;form-request&quot;:false},&quot;update&quot;:{&quot;migration&quot;:false},&quot;delete&quot;:{&quot;migration&quot;:false}},
            exceptions: [],
            models: Object.values([&quot;App\\Author&quot;,&quot;App\\Book&quot;,&quot;App\\Reservation&quot;,&quot;App\\Test&quot;,&quot;App\\User&quot;]),
            migrations: {&quot;redundant&quot;:0,&quot;created&quot;:7,&quot;run&quot;:6},
            relations: {&quot;books&quot;:[{&quot;model&quot;:&quot;App\\Book&quot;,&quot;table&quot;:&quot;books&quot;,&quot;type&quot;:&quot;HasMany&quot;,&quot;relation&quot;:{&quot;model&quot;:&quot;App\\Reservation&quot;,&quot;table&quot;:&quot;reservations&quot;},&quot;method&quot;:{&quot;name&quot;:&quot;reservations&quot;,&quot;file&quot;:&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app\\Book.php&quot;,&quot;line&quot;:76}}],&quot;users&quot;:[{&quot;model&quot;:&quot;App\\User&quot;,&quot;table&quot;:&quot;users&quot;,&quot;type&quot;:&quot;MorphMany&quot;,&quot;relation&quot;:{&quot;model&quot;:&quot;Illuminate\\Notifications\\DatabaseNotification&quot;,&quot;table&quot;:&quot;notifications&quot;},&quot;method&quot;:{&quot;name&quot;:&quot;notifications&quot;,&quot;file&quot;:&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,&quot;line&quot;:12}},{&quot;model&quot;:&quot;App\\User&quot;,&quot;table&quot;:&quot;users&quot;,&quot;type&quot;:&quot;MorphMany&quot;,&quot;relation&quot;:{&quot;model&quot;:&quot;Illuminate\\Notifications\\DatabaseNotification&quot;,&quot;table&quot;:&quot;notifications&quot;},&quot;method&quot;:{&quot;name&quot;:&quot;readNotifications&quot;,&quot;file&quot;:&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,&quot;line&quot;:22}},{&quot;model&quot;:&quot;App\\User&quot;,&quot;table&quot;:&quot;users&quot;,&quot;type&quot;:&quot;MorphMany&quot;,&quot;relation&quot;:{&quot;model&quot;:&quot;Illuminate\\Notifications\\DatabaseNotification&quot;,&quot;table&quot;:&quot;notifications&quot;},&quot;method&quot;:{&quot;name&quot;:&quot;unreadNotifications&quot;,&quot;file&quot;:&quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,&quot;line&quot;:32}}]},
            tables: {&quot;App\\Author&quot;:&quot;authors&quot;,&quot;App\\Book&quot;:&quot;books&quot;,&quot;App\\Reservation&quot;:&quot;reservations&quot;,&quot;App\\Test&quot;:&quot;tests&quot;,&quot;App\\User&quot;:&quot;users&quot;},
            refresh: function() {
                $('body').css('cursor', 'progress');

                $.get('schematics/refresh', function(response) {
                    Schematics.models = response.models;

                    Schematics.relations = response.relations;
                    Schematics.migrations = response.migrations;

                    EventBus.$emit('refresh-navbar', response);

                    if (response.exception) {
                        EventBus.$emit(
                            'alert',
                            `${response.exception.title}: ${response.exception.message}`,
                            'error',
                            10000
                        );
                    }

                    $('body').css('cursor', 'default');
                })
            },
        };
    &lt;/script&gt;

    &lt;div id=&quot;app&quot;&gt;
        &lt;schematics/&gt;
    &lt;/div&gt;

    &lt;script type=&quot;module&quot; src=&quot;http://localhost/vendor/schematics/app.js&quot;&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETschematics" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETschematics"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETschematics"></code></pre>
</div>
<div id="execution-error-GETschematics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETschematics"></code></pre>
</div>
<form id="form-GETschematics" data-method="GET"
      data-path="schematics"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETschematics', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETschematics"
                    onclick="tryItOut('GETschematics');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETschematics"
                    onclick="cancelTryOut('GETschematics');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETschematics" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>schematics</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETschematics-clear-cache">schematics/clear-cache</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/schematics/clear-cache" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/clear-cache"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

Cache cleared
 </code>
        </pre>
    <div id="execution-results-GETschematics-clear-cache" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETschematics-clear-cache"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETschematics-clear-cache"></code></pre>
</div>
<div id="execution-error-GETschematics-clear-cache" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETschematics-clear-cache"></code></pre>
</div>
<form id="form-GETschematics-clear-cache" data-method="GET"
      data-path="schematics/clear-cache"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETschematics-clear-cache', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETschematics-clear-cache"
                    onclick="tryItOut('GETschematics-clear-cache');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETschematics-clear-cache"
                    onclick="cancelTryOut('GETschematics-clear-cache');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETschematics-clear-cache" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>schematics/clear-cache</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETschematics-refresh">schematics/refresh</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/schematics/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;models&quot;: [
        &quot;App\\Author&quot;,
        &quot;App\\Book&quot;,
        &quot;App\\Reservation&quot;,
        &quot;App\\Test&quot;,
        &quot;App\\User&quot;,
        &quot;App\\Author&quot;,
        &quot;App\\Book&quot;,
        &quot;App\\Reservation&quot;,
        &quot;App\\Test&quot;,
        &quot;App\\User&quot;
    ],
    &quot;relations&quot;: {
        &quot;books&quot;: [
            {
                &quot;model&quot;: &quot;App\\Book&quot;,
                &quot;table&quot;: &quot;books&quot;,
                &quot;type&quot;: &quot;HasMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;App\\Reservation&quot;,
                    &quot;table&quot;: &quot;reservations&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;reservations&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app\\Book.php&quot;,
                    &quot;line&quot;: 76
                }
            },
            {
                &quot;model&quot;: &quot;App\\Book&quot;,
                &quot;table&quot;: &quot;books&quot;,
                &quot;type&quot;: &quot;HasMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;App\\Reservation&quot;,
                    &quot;table&quot;: &quot;reservations&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;reservations&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app\\Book.php&quot;,
                    &quot;line&quot;: 76
                }
            },
            {
                &quot;model&quot;: &quot;App\\Book&quot;,
                &quot;table&quot;: &quot;books&quot;,
                &quot;type&quot;: &quot;HasMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;App\\Reservation&quot;,
                    &quot;table&quot;: &quot;reservations&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;reservations&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\app\\Book.php&quot;,
                    &quot;line&quot;: 76
                }
            }
        ],
        &quot;users&quot;: [
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;notifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 12
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;readNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 22
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;unreadNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 32
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;notifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 12
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;readNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 22
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;unreadNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 32
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;notifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 12
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;readNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 22
                }
            },
            {
                &quot;model&quot;: &quot;App\\User&quot;,
                &quot;table&quot;: &quot;users&quot;,
                &quot;type&quot;: &quot;MorphMany&quot;,
                &quot;relation&quot;: {
                    &quot;model&quot;: &quot;Illuminate\\Notifications\\DatabaseNotification&quot;,
                    &quot;table&quot;: &quot;notifications&quot;
                },
                &quot;method&quot;: {
                    &quot;name&quot;: &quot;unreadNotifications&quot;,
                    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php&quot;,
                    &quot;line&quot;: 32
                }
            }
        ]
    },
    &quot;migrations&quot;: {
        &quot;redundant&quot;: 0,
        &quot;created&quot;: 7,
        &quot;run&quot;: 6
    }
}
 </code>
        </pre>
    <div id="execution-results-GETschematics-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETschematics-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETschematics-refresh"></code></pre>
</div>
<div id="execution-error-GETschematics-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETschematics-refresh"></code></pre>
</div>
<form id="form-GETschematics-refresh" data-method="GET"
      data-path="schematics/refresh"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETschematics-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETschematics-refresh"
                    onclick="tryItOut('GETschematics-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETschematics-refresh"
                    onclick="cancelTryOut('GETschematics-refresh');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETschematics-refresh" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>schematics/refresh</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-relations-create">schematics/relations/create</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/schematics/relations/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{\"type\":\"magni\",\"source\":\"maxime\",\"target\":\"magni\",\"options\":[\"voluptatum\"],\"method\":{\"name\":\"ea\"}}"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/relations/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "magni",
    "source": "maxime",
    "target": "magni",
    "options": [
        "voluptatum"
    ],
    "method": {
        "name": "ea"
    }
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-relations-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-relations-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-relations-create"></code></pre>
</div>
<div id="execution-error-POSTschematics-relations-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-relations-create"></code></pre>
</div>
<form id="form-POSTschematics-relations-create" data-method="POST"
      data-path="schematics/relations/create"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-relations-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-relations-create"
                    onclick="tryItOut('POSTschematics-relations-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-relations-create"
                    onclick="cancelTryOut('POSTschematics-relations-create');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-relations-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/relations/create</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTschematics-relations-create" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="source" data-endpoint="POSTschematics-relations-create" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>target</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="target" data-endpoint="POSTschematics-relations-create" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>options</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
<input type="text" name="options.0" data-endpoint="POSTschematics-relations-create" data-component="body" required  hidden>
<input type="text" name="options.1" data-endpoint="POSTschematics-relations-create" data-component="body" hidden>
<br>
        </p>
                <p>
        <details>
            <summary>
                <b><code>method</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
            </summary>
            <br>
                                                <p>
                        <b><code>method.name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="method.name" data-endpoint="POSTschematics-relations-create" data-component="body" required  hidden>
<br>
                    </p>
                                    </details>
        </p>
    
    </form>

            <h2 id="endpoints-POSTschematics-relations-delete">schematics/relations/delete</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/schematics/relations/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{\"method\":{\"name\":\"quo\",\"file\":\"aliquam\",\"line\":4}}"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/relations/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "method": {
        "name": "quo",
        "file": "aliquam",
        "line": 4
    }
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-relations-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-relations-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-relations-delete"></code></pre>
</div>
<div id="execution-error-POSTschematics-relations-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-relations-delete"></code></pre>
</div>
<form id="form-POSTschematics-relations-delete" data-method="POST"
      data-path="schematics/relations/delete"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-relations-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-relations-delete"
                    onclick="tryItOut('POSTschematics-relations-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-relations-delete"
                    onclick="cancelTryOut('POSTschematics-relations-delete');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-relations-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/relations/delete</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
        <details>
            <summary>
                <b><code>method</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
            </summary>
            <br>
                                                <p>
                        <b><code>method.name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="method.name" data-endpoint="POSTschematics-relations-delete" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>method.file</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="method.file" data-endpoint="POSTschematics-relations-delete" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>method.line</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="method.line" data-endpoint="POSTschematics-relations-delete" data-component="body" required  hidden>
<br>
                    </p>
                                    </details>
        </p>
    
    </form>

            <h2 id="endpoints-GETschematics-models-edit">schematics/models/edit</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/schematics/models/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/models/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Class name must be a valid object or a string&quot;,
    &quot;exception&quot;: &quot;Error&quot;,
    &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\mtolhuys\\laravel-schematics\\src\\Http\\Controllers\\ModelsController.php&quot;,
    &quot;line&quot;: 58,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;columns&quot;,
            &quot;class&quot;: &quot;Mtolhuys\\LaravelSchematics\\Http\\Controllers\\ModelsController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 239,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 196,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 685,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 687,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 628,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 617,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 165,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\barryvdh\\laravel-debugbar\\src\\Middleware\\InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php&quot;,
            &quot;line&quot;: 63,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\fideloper\\proxy\\src\\TrustProxies.php&quot;,
            &quot;line&quot;: 57,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fideloper\\Proxy\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 140,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 109,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 275,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 228,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 119,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 322,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 596,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 134,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 288,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 974,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\xampp\\htdocs\\laravel-test-concepts\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}
 </code>
        </pre>
    <div id="execution-results-GETschematics-models-edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETschematics-models-edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETschematics-models-edit"></code></pre>
</div>
<div id="execution-error-GETschematics-models-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETschematics-models-edit"></code></pre>
</div>
<form id="form-GETschematics-models-edit" data-method="GET"
      data-path="schematics/models/edit"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETschematics-models-edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETschematics-models-edit"
                    onclick="tryItOut('GETschematics-models-edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETschematics-models-edit"
                    onclick="cancelTryOut('GETschematics-models-edit');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETschematics-models-edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>schematics/models/edit</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-models-create">schematics/models/create</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/schematics/models/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{\"name\":\"voluptas\",\"fields\":[\"aut\"]}"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/models/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptas",
    "fields": [
        "aut"
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-models-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-models-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-models-create"></code></pre>
</div>
<div id="execution-error-POSTschematics-models-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-models-create"></code></pre>
</div>
<form id="form-POSTschematics-models-create" data-method="POST"
      data-path="schematics/models/create"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-models-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-models-create"
                    onclick="tryItOut('POSTschematics-models-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-models-create"
                    onclick="cancelTryOut('POSTschematics-models-create');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-models-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/models/create</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTschematics-models-create" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>fields</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
<input type="text" name="fields.0" data-endpoint="POSTschematics-models-create" data-component="body" required  hidden>
<input type="text" name="fields.1" data-endpoint="POSTschematics-models-create" data-component="body" hidden>
<br>
        </p>
    
    </form>

            <h2 id="endpoints-POSTschematics-models-delete">schematics/models/delete</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/schematics/models/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{\"name\":\"voluptatum\"}"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/models/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-models-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-models-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-models-delete"></code></pre>
</div>
<div id="execution-error-POSTschematics-models-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-models-delete"></code></pre>
</div>
<form id="form-POSTschematics-models-delete" data-method="POST"
      data-path="schematics/models/delete"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-models-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-models-delete"
                    onclick="tryItOut('POSTschematics-models-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-models-delete"
                    onclick="cancelTryOut('POSTschematics-models-delete');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-models-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/models/delete</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTschematics-models-delete" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

            <h2 id="endpoints-POSTschematics-models-edit">schematics/models/edit</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/schematics/models/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{\"model\":\"cum\",\"fields\":[\"quasi\"],\"created\":[\"nisi\"],\"changed\":[\"omnis\"],\"deleted\":[\"culpa\"]}"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/models/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "model": "cum",
    "fields": [
        "quasi"
    ],
    "created": [
        "nisi"
    ],
    "changed": [
        "omnis"
    ],
    "deleted": [
        "culpa"
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-models-edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-models-edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-models-edit"></code></pre>
</div>
<div id="execution-error-POSTschematics-models-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-models-edit"></code></pre>
</div>
<form id="form-POSTschematics-models-edit" data-method="POST"
      data-path="schematics/models/edit"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-models-edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-models-edit"
                    onclick="tryItOut('POSTschematics-models-edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-models-edit"
                    onclick="cancelTryOut('POSTschematics-models-edit');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-models-edit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/models/edit</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="model" data-endpoint="POSTschematics-models-edit" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>fields</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
<input type="text" name="fields.0" data-endpoint="POSTschematics-models-edit" data-component="body" required  hidden>
<input type="text" name="fields.1" data-endpoint="POSTschematics-models-edit" data-component="body" hidden>
<br>
        </p>
                <p>
            <b><code>created</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="created.0" data-endpoint="POSTschematics-models-edit" data-component="body"  hidden>
<input type="text" name="created.1" data-endpoint="POSTschematics-models-edit" data-component="body" hidden>
<br>
        </p>
                <p>
            <b><code>changed</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="changed.0" data-endpoint="POSTschematics-models-edit" data-component="body"  hidden>
<input type="text" name="changed.1" data-endpoint="POSTschematics-models-edit" data-component="body" hidden>
<br>
        </p>
                <p>
            <b><code>deleted</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="deleted.0" data-endpoint="POSTschematics-models-edit" data-component="body"  hidden>
<input type="text" name="deleted.1" data-endpoint="POSTschematics-models-edit" data-component="body" hidden>
<br>
        </p>
    
    </form>

            <h2 id="endpoints-POSTschematics-migrations-run">schematics/migrations/run</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/run" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/run"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-run" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-run"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-run"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-run" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-run"></code></pre>
</div>
<form id="form-POSTschematics-migrations-run" data-method="POST"
      data-path="schematics/migrations/run"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-run', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-run"
                    onclick="tryItOut('POSTschematics-migrations-run');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-run"
                    onclick="cancelTryOut('POSTschematics-migrations-run');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-run" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/run</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-migrations-rollback">schematics/migrations/rollback</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/rollback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/rollback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-rollback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-rollback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-rollback"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-rollback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-rollback"></code></pre>
</div>
<form id="form-POSTschematics-migrations-rollback" data-method="POST"
      data-path="schematics/migrations/rollback"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-rollback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-rollback"
                    onclick="tryItOut('POSTschematics-migrations-rollback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-rollback"
                    onclick="cancelTryOut('POSTschematics-migrations-rollback');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-rollback" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/rollback</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-migrations-refresh">schematics/migrations/refresh</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-refresh"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-refresh"></code></pre>
</div>
<form id="form-POSTschematics-migrations-refresh" data-method="POST"
      data-path="schematics/migrations/refresh"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-refresh"
                    onclick="tryItOut('POSTschematics-migrations-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-refresh"
                    onclick="cancelTryOut('POSTschematics-migrations-refresh');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-refresh" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/refresh</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-migrations-fresh">schematics/migrations/fresh</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/fresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/fresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-fresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-fresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-fresh"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-fresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-fresh"></code></pre>
</div>
<form id="form-POSTschematics-migrations-fresh" data-method="POST"
      data-path="schematics/migrations/fresh"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-fresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-fresh"
                    onclick="tryItOut('POSTschematics-migrations-fresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-fresh"
                    onclick="cancelTryOut('POSTschematics-migrations-fresh');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-fresh" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/fresh</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-migrations-seed">schematics/migrations/seed</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/seed" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/seed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-seed" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-seed"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-seed"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-seed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-seed"></code></pre>
</div>
<form id="form-POSTschematics-migrations-seed" data-method="POST"
      data-path="schematics/migrations/seed"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-seed', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-seed"
                    onclick="tryItOut('POSTschematics-migrations-seed');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-seed"
                    onclick="cancelTryOut('POSTschematics-migrations-seed');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-seed" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/seed</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTschematics-migrations-delete-last">schematics/migrations/delete-last</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/schematics/migrations/delete-last" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/schematics/migrations/delete-last"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTschematics-migrations-delete-last" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTschematics-migrations-delete-last"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTschematics-migrations-delete-last"></code></pre>
</div>
<div id="execution-error-POSTschematics-migrations-delete-last" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTschematics-migrations-delete-last"></code></pre>
</div>
<form id="form-POSTschematics-migrations-delete-last" data-method="POST"
      data-path="schematics/migrations/delete-last"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTschematics-migrations-delete-last', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTschematics-migrations-delete-last"
                    onclick="tryItOut('POSTschematics-migrations-delete-last');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTschematics-migrations-delete-last"
                    onclick="cancelTryOut('POSTschematics-migrations-delete-last');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTschematics-migrations-delete-last" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>schematics/migrations/delete-last</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-user">api/user</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}
 </code>
        </pre>
    <div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETlogin">Show the application&#039;s login form.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6InFrYzN3RXRxa0pSUHFKQ0V4MTNXaVE9PSIsInZhbHVlIjoicjlHTDhNQjFvb0FGWitieStCWkNsLzRyT3FRTmg3bGNiOGNTYm9mZjdTckNpZFE0TUw4UU9reGJaQ1h6ZDZKYkFsaDFMcFA0TDc3ZHg3NGtnQ3VvTGtEQ0hSTGNyaWRUWHhlVC90bVd4TDlqckxQTWpROFdCUWRWZnpwZ3JyTFMiLCJtYWMiOiJkZmY4ZDI3MzA1MDE4ZmFhOGMzYzFiOGYwMDAyOGY5OTIwYzAwNzBiNzc4MjAyMTY0MzQxNmZlZTU0ZGJjZTExIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6Im1mWGc3cnZPVHYvUjBSK3ZSdms0UHc9PSIsInZhbHVlIjoicVU4VVR2bkJEa0pYOHM0SktURnZyU2RlQ2xGcmdUVE1GaFR2ZDlnRVdIREVaOXUzRmVBZXVsNldyQ2tBQ2lDa3JtR1pHVGZrUisreEUrU2NWSHg5WlV4bnNnSEJDZjl6dzlycGwvNkZQdkdrVGV1UTBhNHc1aGRZT1pVTXc2bm0iLCJtYWMiOiI2MmNlN2Q4MzAzYWIxMmQ1YjcwMWYwNmY1ZTJlZTY2YWFlYTc0Yzk2YTA0NmI5NDljN2M3MjQzNzI2ZjhmYzkyIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src=&quot;http://localhost/js/app.js&quot; defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;dns-prefetch&quot; href=&quot;//fonts.gstatic.com&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;!-- Styles --&gt;
    &lt;link href=&quot;http://localhost/css/app.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id=&quot;app&quot;&gt;
        &lt;nav class=&quot;navbar navbar-expand-md navbar-light bg-white shadow-sm&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
                &lt;a class=&quot;navbar-brand&quot; href=&quot;http://localhost&quot;&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarSupportedContent&quot; aria-controls=&quot;navbarSupportedContent&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarSupportedContent&quot;&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav mr-auto&quot;&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class=&quot;nav-item&quot;&gt;
                                &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class=&quot;nav-item&quot;&gt;
                                    &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class=&quot;py-4&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row justify-content-center&quot;&gt;
        &lt;div class=&quot;col-md-8&quot;&gt;
            &lt;div class=&quot;card&quot;&gt;
                &lt;div class=&quot;card-header&quot;&gt;Login&lt;/div&gt;

                &lt;div class=&quot;card-body&quot;&gt;
                    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/login&quot;&gt;
                        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;
                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;email&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;email&quot; type=&quot;email&quot; class=&quot;form-control &quot; name=&quot;email&quot; value=&quot;&quot; required autocomplete=&quot;email&quot; autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;password&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Password&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;password&quot; type=&quot;password&quot; class=&quot;form-control &quot; name=&quot;password&quot; required autocomplete=&quot;current-password&quot;&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;div class=&quot;col-md-6 offset-md-4&quot;&gt;
                                &lt;div class=&quot;form-check&quot;&gt;
                                    &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot; name=&quot;remember&quot; id=&quot;remember&quot; &gt;

                                    &lt;label class=&quot;form-check-label&quot; for=&quot;remember&quot;&gt;
                                        Remember Me
                                    &lt;/label&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row mb-0&quot;&gt;
                            &lt;div class=&quot;col-md-8 offset-md-4&quot;&gt;
                                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;
                                    Login
                                &lt;/button&gt;

                                                                    &lt;a class=&quot;btn btn-link&quot; href=&quot;http://localhost/password/reset&quot;&gt;
                                        Forgot Your Password?
                                    &lt;/a&gt;
                                                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTlogin">Handle a login request to the application.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTlogout">Log the user out of the application.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"></code></pre>
</div>
<div id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout"></code></pre>
</div>
<form id="form-POSTlogout" data-method="POST"
      data-path="logout"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogout"
                    onclick="tryItOut('POSTlogout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogout"
                    onclick="cancelTryOut('POSTlogout');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>logout</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETregister">Show the application registration form.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6Ikc2SGxQRWFqSXZmS3pnN29lRVhkemc9PSIsInZhbHVlIjoiSGVWNG5wSE10a0RYbE10RTl3UWUrcERVOWVEdzFSODlwWFByRG43ZW95U1hNZUNDVlFJcTUzWVRBU2M5Zm03Zm44T1U0S24ycFVLalJRdTRJRTlkZUtYMTdMWGhHdTM1NjJRYUF1WGw5dm1SSU1lZjNMUlJyQkd2Mk8xUDVwVzQiLCJtYWMiOiI2MzdmMjkwMTFiYmQ2ZjQxZjFmYmE0NGVlODk1YjRlZWRkMmM4YTE0Y2UyOTNlY2I1Y2ZkZmNjYjkzMDM4N2UyIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6Im9Db3JQT3ZaVlk0NGFKTXJ0K3BaU3c9PSIsInZhbHVlIjoiVThwWUpnekFFODVYWThXOEFHSXdDVDQ5VU16ejR5Tmg1R2FFSEJHMzZ1MFFZMjhuN1NFRno5ZzhwUXZWQitkd0w1YW5lNWdZOE9pU3JjTVoxaHNVT2F4ZnY5U0RXQ0FuaTV1Ky9nMkdJMjc4SzZHY283TUVmVUw3RXBSQmdaZXkiLCJtYWMiOiIxYWU2OGQzNjZkOWVlNzc4ZmRhNzUwODM1ZjRlOTg2MzNjZmIyOGZlMGU4NWQ5NDgyZWY3NWNhZjcwZmNjNjNlIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src=&quot;http://localhost/js/app.js&quot; defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;dns-prefetch&quot; href=&quot;//fonts.gstatic.com&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;!-- Styles --&gt;
    &lt;link href=&quot;http://localhost/css/app.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id=&quot;app&quot;&gt;
        &lt;nav class=&quot;navbar navbar-expand-md navbar-light bg-white shadow-sm&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
                &lt;a class=&quot;navbar-brand&quot; href=&quot;http://localhost&quot;&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarSupportedContent&quot; aria-controls=&quot;navbarSupportedContent&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarSupportedContent&quot;&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav mr-auto&quot;&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class=&quot;nav-item&quot;&gt;
                                &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class=&quot;nav-item&quot;&gt;
                                    &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class=&quot;py-4&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row justify-content-center&quot;&gt;
        &lt;div class=&quot;col-md-8&quot;&gt;
            &lt;div class=&quot;card&quot;&gt;
                &lt;div class=&quot;card-header&quot;&gt;Register&lt;/div&gt;

                &lt;div class=&quot;card-body&quot;&gt;
                    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/register&quot;&gt;
                        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;
                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;name&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Name&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;name&quot; type=&quot;text&quot; class=&quot;form-control &quot; name=&quot;name&quot; value=&quot;&quot; required autocomplete=&quot;name&quot; autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;email&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;email&quot; type=&quot;email&quot; class=&quot;form-control &quot; name=&quot;email&quot; value=&quot;&quot; required autocomplete=&quot;email&quot;&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;password&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Password&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;password&quot; type=&quot;password&quot; class=&quot;form-control &quot; name=&quot;password&quot; required autocomplete=&quot;new-password&quot;&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;password-confirm&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Confirm Password&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;password-confirm&quot; type=&quot;password&quot; class=&quot;form-control&quot; name=&quot;password_confirmation&quot; required autocomplete=&quot;new-password&quot;&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row mb-0&quot;&gt;
                            &lt;div class=&quot;col-md-6 offset-md-4&quot;&gt;
                                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;
                                    Register
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"></code></pre>
</div>
<div id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister"></code></pre>
</div>
<form id="form-GETregister" data-method="GET"
      data-path="register"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETregister"
                    onclick="tryItOut('GETregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETregister"
                    onclick="cancelTryOut('GETregister');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETregister" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>register</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTregister">Handle a registration request for the application.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"></code></pre>
</div>
<div id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister"></code></pre>
</div>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETpassword-reset">Display the form to request a password reset link.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6ImZRR0JsaXdxS0FkNHpIM3piR2E1a0E9PSIsInZhbHVlIjoiamdBMVZ0QW1zVW55enNKT2J1aWpGVzQ3QVNYMTNLbDNCcm5JRmlwckYzYnRYT1MvL1RHTmZNSW5rNFltcERNYTZ0cWFVMjZ3YW5MUFA3c1Jkb25TODhUU3hMMXN1NWxrWXJFR0JiN00xRDEzbTl6ekdHbXpDdXdHcmYrNXZHSlkiLCJtYWMiOiJjMWQzY2ZjMTE2OTcwNTM1MDlhODlmY2VmMDg4MTk5NDcxNmY0YmUyMDUxN2VhYjk0ZGM5ZmM4NDdhNmM4YjliIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IlkvbzA4OHdjODR3Nlg1OVdvREZrSGc9PSIsInZhbHVlIjoiaUd4L2RtRUZPdTZRd1hORExISGl3azkzakwwa1g4UmcySXZjT1JNWFl6Yk83UnpSUUZsQUZzZ1pya1V4WEZZK0l3WjhEVUVQMUtySVFWNThXSGpBcDA5bVFZZTFrZjduRm9qdlpOUHlzZ3RSeFlRVXBRVTdXcUVXMWQ2MURjZXkiLCJtYWMiOiI5YzQ0MDM0ZDEzOGQ1NzBhMmMyMjQyYWI5YmY4ZGY5ZTg1ZjU5ZWViZjNmOGMxNWVlMmJmYjFlM2RjOGIyMjIwIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src=&quot;http://localhost/js/app.js&quot; defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;dns-prefetch&quot; href=&quot;//fonts.gstatic.com&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;!-- Styles --&gt;
    &lt;link href=&quot;http://localhost/css/app.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id=&quot;app&quot;&gt;
        &lt;nav class=&quot;navbar navbar-expand-md navbar-light bg-white shadow-sm&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
                &lt;a class=&quot;navbar-brand&quot; href=&quot;http://localhost&quot;&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarSupportedContent&quot; aria-controls=&quot;navbarSupportedContent&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarSupportedContent&quot;&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav mr-auto&quot;&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class=&quot;nav-item&quot;&gt;
                                &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class=&quot;nav-item&quot;&gt;
                                    &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class=&quot;py-4&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row justify-content-center&quot;&gt;
        &lt;div class=&quot;col-md-8&quot;&gt;
            &lt;div class=&quot;card&quot;&gt;
                &lt;div class=&quot;card-header&quot;&gt;Reset Password&lt;/div&gt;

                &lt;div class=&quot;card-body&quot;&gt;
                    
                    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/password/email&quot;&gt;
                        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;
                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;email&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;email&quot; type=&quot;email&quot; class=&quot;form-control &quot; name=&quot;email&quot; value=&quot;&quot; required autocomplete=&quot;email&quot; autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row mb-0&quot;&gt;
                            &lt;div class=&quot;col-md-6 offset-md-4&quot;&gt;
                                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;
                                    Send Password Reset Link
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETpassword-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset"></code></pre>
</div>
<div id="execution-error-GETpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset"></code></pre>
</div>
<form id="form-GETpassword-reset" data-method="GET"
      data-path="password/reset"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-reset"
                    onclick="tryItOut('GETpassword-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-reset"
                    onclick="cancelTryOut('GETpassword-reset');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-reset" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/reset</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTpassword-email">Send a reset link to the given user.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/password/email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTpassword-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-email"></code></pre>
</div>
<div id="execution-error-POSTpassword-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-email"></code></pre>
</div>
<form id="form-POSTpassword-email" data-method="POST"
      data-path="password/email"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-email"
                    onclick="tryItOut('POSTpassword-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-email"
                    onclick="cancelTryOut('POSTpassword-email');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-email" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/email</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETpassword-reset--token-">Display the password reset view for the given token.</h2>

<p>
</p>

<p>If no token is present, display the link request form.</p>

<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/password/reset/recusandae" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset/recusandae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IndRYWN3d01XYnNmU1l6eDVSZnpOSEE9PSIsInZhbHVlIjoiWnJjcFFVNkpuNHYxNnJaM2ZOb0R3ak9YRGNiVGVHSmFHNFloT3VnbG9MMUFxL1B2NXZiZGowWGxESFF6dm43L3F3b0ZTdXBnMzJHRDh3b3RyVXlrOGdJL3FzV3pnV0JwRTNlL05oTHM3ZEFlZThjV0NsdDBRTkJ3UmpidGtTelkiLCJtYWMiOiI2MjdmYTg5YTQwZGUwZmI2Mzc5OTFlYTU4MGJmODQzMzUzMzM4ODM4OTE3OTE2NDU3NzQyNGFhYTMzNWRjODZlIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6ImlvM25udzhTVzNKNVhBOHd4Y2dONHc9PSIsInZhbHVlIjoiMVlITkxwRTJzQUh6UHZKZjVyVWY3dEpOK0VjRGh4c2ozWnJwNkNBY2d5Wnc0OWx3aFRDMnlZN2ZzaHprOW9PL0tLNnRGRmw2MSsxOTl1YUU3b2lTNGxTMFJIZllBNDZKYzJBYXJyS1FpUmxpNE5hNG1DTUt5ai9pWWlzUVpkUkIiLCJtYWMiOiI2YmRhNzU1ZGFiMzhlM2JlOTU1ODQ4MmM5Y2FhZWM4NWY5YTQ4MmE5MWVlNmU5MDVmMmU5OTdmOWQxMTMxMGUwIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name=&quot;csrf-token&quot; content=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src=&quot;http://localhost/js/app.js&quot; defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;dns-prefetch&quot; href=&quot;//fonts.gstatic.com&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;!-- Styles --&gt;
    &lt;link href=&quot;http://localhost/css/app.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id=&quot;app&quot;&gt;
        &lt;nav class=&quot;navbar navbar-expand-md navbar-light bg-white shadow-sm&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
                &lt;a class=&quot;navbar-brand&quot; href=&quot;http://localhost&quot;&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarSupportedContent&quot; aria-controls=&quot;navbarSupportedContent&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarSupportedContent&quot;&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav mr-auto&quot;&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class=&quot;nav-item&quot;&gt;
                                &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class=&quot;nav-item&quot;&gt;
                                    &lt;a class=&quot;nav-link&quot; href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class=&quot;py-4&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row justify-content-center&quot;&gt;
        &lt;div class=&quot;col-md-8&quot;&gt;
            &lt;div class=&quot;card&quot;&gt;
                &lt;div class=&quot;card-header&quot;&gt;Reset Password&lt;/div&gt;

                &lt;div class=&quot;card-body&quot;&gt;
                    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/password/reset&quot;&gt;
                        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;CxEGKkIzf5VrzLqrwh46juRzhIXo3fF00yeidcml&quot;&gt;
                        &lt;input type=&quot;hidden&quot; name=&quot;token&quot; value=&quot;recusandae&quot;&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;email&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;email&quot; type=&quot;email&quot; class=&quot;form-control &quot; name=&quot;email&quot; value=&quot;&quot; required autocomplete=&quot;email&quot; autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;password&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Password&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;password&quot; type=&quot;password&quot; class=&quot;form-control &quot; name=&quot;password&quot; required autocomplete=&quot;new-password&quot;&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row&quot;&gt;
                            &lt;label for=&quot;password-confirm&quot; class=&quot;col-md-4 col-form-label text-md-right&quot;&gt;Confirm Password&lt;/label&gt;

                            &lt;div class=&quot;col-md-6&quot;&gt;
                                &lt;input id=&quot;password-confirm&quot; type=&quot;password&quot; class=&quot;form-control&quot; name=&quot;password_confirmation&quot; required autocomplete=&quot;new-password&quot;&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class=&quot;form-group row mb-0&quot;&gt;
                            &lt;div class=&quot;col-md-6 offset-md-4&quot;&gt;
                                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;
                                    Reset Password
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GETpassword-reset--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-reset--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset--token-"></code></pre>
</div>
<div id="execution-error-GETpassword-reset--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset--token-"></code></pre>
</div>
<form id="form-GETpassword-reset--token-" data-method="GET"
      data-path="password/reset/{token}"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-reset--token-"
                    onclick="tryItOut('GETpassword-reset--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-reset--token-"
                    onclick="cancelTryOut('GETpassword-reset--token-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-reset--token-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/reset/{token}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="GETpassword-reset--token-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="endpoints-POSTpassword-reset">Reset the given user&#039;s password.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTpassword-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-reset"></code></pre>
</div>
<div id="execution-error-POSTpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-reset"></code></pre>
</div>
<form id="form-POSTpassword-reset" data-method="POST"
      data-path="password/reset"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-reset"
                    onclick="tryItOut('POSTpassword-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-reset"
                    onclick="cancelTryOut('POSTpassword-reset');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-reset" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/reset</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETpassword-confirm">Display the password confirmation view.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/password/confirm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImlyaTY2Q2RUdC9XT0xKTVk4YkNVN2c9PSIsInZhbHVlIjoidW5CVG8xc2RzVkMzakRwZmtJblJIY3oxdTlMcFQwQVFoNDFFRExabHIyeVptMEFNTlp5WndoRFV3aUZOSnRuVEhNbmkxR2gzVCswZGhxY0o1TXdnWXh6Sml5N1daRGwxdGVtZVc4dHptOE9NTzB5OXVLOTNzRjhXc3JjWWZKQ0siLCJtYWMiOiJjNmJiZWJhY2JmZTljN2ViYmNlYjk4N2MwMDAyNGNjNjlmNDIyYjFiOTM2MWZmMmVjNTc0YjhlODQ5MzI5MDhjIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IlRFdVQzT1Z2NWU2eERyZWExdnAydnc9PSIsInZhbHVlIjoid201QzFmMGtCcVNyQTJoc2dOSVR4NjZUWHh2WG5Nc2txQ1NVSWljSFlHVVd3ZkdJdjhQL1pkMTFDeENVUHpFOVp0THNabVVtVmpnTnVuVUtUT0VhR2M1Mm4yaWk3RmxTd1pNZUYrUElVWTR1dWl6YkE2RS9sZER3U3VYeEVNcEkiLCJtYWMiOiIyOGYwNDdhYTA2ZjYxYThmODg3NDI3ZTdlNzM2NDc5ODMwOWU0MzJkNWQ2Yzk5NjFiMjMyMmIwMjUyYzEyMmU3In0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}
 </code>
        </pre>
    <div id="execution-results-GETpassword-confirm" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-confirm"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-confirm"></code></pre>
</div>
<div id="execution-error-GETpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-confirm"></code></pre>
</div>
<form id="form-GETpassword-confirm" data-method="GET"
      data-path="password/confirm"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-confirm', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-confirm"
                    onclick="tryItOut('GETpassword-confirm');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-confirm"
                    onclick="cancelTryOut('GETpassword-confirm');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-confirm" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/confirm</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTpassword-confirm">Confirm the given user&#039;s password.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request POST \
    "http://localhost/password/confirm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTpassword-confirm" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-confirm"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-confirm"></code></pre>
</div>
<div id="execution-error-POSTpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-confirm"></code></pre>
</div>
<form id="form-POSTpassword-confirm" data-method="POST"
      data-path="password/confirm"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-confirm', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-confirm"
                    onclick="tryItOut('POSTpassword-confirm');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-confirm"
                    onclick="cancelTryOut('POSTpassword-confirm');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-confirm" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/confirm</code></b>
        </p>
                    </form>

        <h1 id="home-module">Home Module</h1>
    <p>
        
    </p>

            <h2 id="home-module-GEThome">Show the application dashboard.</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/home" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImFySllZd2lnekdNNk12OE8zL005QlE9PSIsInZhbHVlIjoib3p4dzhVZ3FCTlJmdXdnbzg1dk1NRlMyYkptdjRINm5FR09yeDh3Y0RmN2tod2J5bi9LYVBqOUcyZlBKNVc4Uk5BdzlVa2hOdVFHaVJ0S0ZkcEk5ZThLb1ViMEg4ZUhncW5zc3hBV3AwanlNaTZKZklTU3A2cU9iaGc1OG5oNkciLCJtYWMiOiI5YjU3YzUwZDVhZmMyYTM2NDI5MmMwOTE3NWMwZTc0MWJhMjYxNzM0OTZiY2U0NWQyZjkwNGFlMThlMjIxZjZiIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IktzRklNSU1CKzh2bDAvUWVuWTR0R2c9PSIsInZhbHVlIjoiMjRFSC90VGUvQW9lb1BpaWp2dU5HRUlpWExaUjVuNmJkUDcrU1pJcmZxemtrODlBTlNKbkV4cnI3bENXbXZTYWsxMklWd04yblc5Slg1ckdFRnRMMVBRVTFhaEFOSnhGbE1ZOFZ4Zm15RUdNVlNRQzRpQVc2YXRPZzc4ODVNakoiLCJtYWMiOiIyZDBjZjJlOTViZTI5ZTY3OGY4MThhMjdlOWNjM2IxYWMzZWRiNzBkMGM3NDlkOGMxYTM4MzQwODZmMzJmYmE4In0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">
{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}
 </code>
        </pre>
    <div id="execution-results-GEThome" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GEThome"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GEThome"></code></pre>
</div>
<div id="execution-error-GEThome" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome"></code></pre>
</div>
<form id="form-GEThome" data-method="GET"
      data-path="home"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GEThome', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GEThome"
                    onclick="tryItOut('GEThome');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GEThome"
                    onclick="cancelTryOut('GEThome');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GEThome" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>home</code></b>
        </p>
                    </form>

        <h1 id="url-module">URL Module</h1>
    <p>
        
    </p>

            <h2 id="url-module-GET-">/</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-bash">
curl --request GET \
    --get "http://localhost/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"```</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre>
            <code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6Im02ZzVzejN5MFFnd0xQTG9RMjlQMWc9PSIsInZhbHVlIjoiRTlERGtoTlA1RnFnY1FlUUJoS3VSR1hzdUlVRkVjeVFyWktUU2RnNjNaYUhzSHRkNmFUT0RKNmg2T1BDeThTemN4QVZmUHExSjFtdWZqT05RM2tYQ3ppdWZ6cjdQUTBJdWdseTdxMGFNM3BwVmNQUThUQ09YWXhIdXJSTnRrTEIiLCJtYWMiOiIyMDFjNjk0NzlhMTMwNzlmZTZjMzEzYTQ2Nzc5ZjA3M2RmNGNiODRhZWRiMDliOGQwOGM0YmM1Y2Q1MTQwZGIwIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; laravel_session=eyJpdiI6IjB5QkZkaExJczErREN0bzRwcGdBUmc9PSIsInZhbHVlIjoiL3RNaUQxVkxzR2VUTHdzV3kwTjRoNnp5MWlSUW5LMnFWSEVTQ3Avc3Q4TVZ1OE03cTcwVi9JTDYvL1ZJMzRhc0JMaEJpemxIZWN1S3FENlBLV0xnQnQ1TVZyREw4OE5tK3dLWnpiUUhBekFqcCtxdGJqVk1EdkdXOURQSUU0Q3kiLCJtYWMiOiI3MjYwZjk3YTJjOGE3MGU2NDNlMmFhZTU4YTgzYzkyMTI3OWNhZjY1YzUyY2QwNWU2NjUwODAxNWU2MWZhODNjIn0%3D; expires=Thu, 17-Jun-2021 15:22:49 GMT; Max-Age=7200; path=/; httponly
 </code>
            </pre>
        </details>         <pre>
                <code class="language-json">

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito:200,600&quot; rel=&quot;stylesheet&quot;&gt;

        &lt;!-- Styles --&gt;
        &lt;style&gt;
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links &gt; a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        &lt;/style&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div class=&quot;flex-center position-ref full-height&quot;&gt;
                            &lt;div class=&quot;top-right links&quot;&gt;
                                            &lt;a href=&quot;http://localhost/login&quot;&gt;Login&lt;/a&gt;

                                                    &lt;a href=&quot;http://localhost/register&quot;&gt;Register&lt;/a&gt;
                                                            &lt;/div&gt;
            
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;title m-b-md&quot;&gt;
                    Laravel
                &lt;/div&gt;

                &lt;div class=&quot;links&quot;&gt;
                    &lt;a href=&quot;https://laravel.com/docs&quot;&gt;Docs&lt;/a&gt;
                    &lt;a href=&quot;https://laracasts.com&quot;&gt;Laracasts&lt;/a&gt;
                    &lt;a href=&quot;https://laravel-news.com&quot;&gt;News&lt;/a&gt;
                    &lt;a href=&quot;https://blog.laravel.com&quot;&gt;Blog&lt;/a&gt;
                    &lt;a href=&quot;https://nova.laravel.com&quot;&gt;Nova&lt;/a&gt;
                    &lt;a href=&quot;https://forge.laravel.com&quot;&gt;Forge&lt;/a&gt;
                    &lt;a href=&quot;https://vapor.laravel.com&quot;&gt;Vapor&lt;/a&gt;
                    &lt;a href=&quot;https://github.com/laravel/laravel&quot;&gt;GitHub&lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;

 </code>
        </pre>
    <div id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var exampleLanguages = ["bash","javascript"];
        setupLanguages(exampleLanguages);
    });
</script>
</body>
</html>