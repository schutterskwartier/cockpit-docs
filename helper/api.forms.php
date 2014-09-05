<h3>API - Forms</h3>

<p>
Forms have been always a pain. Especially handling the data after form submission. We're happy to say that now Cockpit will do the dirty job for you. Cockpit collects the data + transfers it via email.

We choose not to build a form builder, because we think you know HTML very well and we don't want to step in your code flow.
</p>


<span class="label">A Typical Form Example</span>

<pre><code class="html">&lt;form name="contact"&gt;
  &lt;p&gt;
    &lt;label for="name"&gt;Name&lt;/label&gt;
    &lt;input id="name" name="name"/&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;label for="email"&gt;Email&lt;/label&gt;
    &lt;input id="email" name="email"/&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;label for="message"&gt;Message&lt;/label&gt;
    &lt;textarea id="message" name="message"&gt;&lt;/textarea&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;button type="submit"&gt;Send&lt;/button&gt;
  &lt;/p&gt;
&lt;/form&gt;</code></pre>

<p>
This is a really basic contact form with a name, email and message field. 
To make it work with Cockpit, we simply replace the &lt;form&gt; tag with the new <strong>form</strong> function and add the the <span class="label label-info">form[...]</span> prefix to the form fields we want to track.
We also include a <span class="label label-info">&lt;div class=&quot;success&quot; /&gt;</span> div to be shown once the form has been successfully submitted:
</p>

<pre><code class="html">&lt;?php form("contact");?&gt;
  &lt;div class="success-message"&gt;
    Thank You! I'll get back to you real soon...
  &lt;/div&gt;

  &lt;p&gt;
    &lt;label for="name"&gt;Name&lt;/label&gt;
    &lt;input id="name" name="form[name]"/&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;label for="email"&gt;Email&lt;/label&gt;
    &lt;input id="email" name="form[email]"/&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;label for="message"&gt;Message&lt;/label&gt;
    &lt;textarea id="message" name="form[message]"&gt;&lt;/textarea&gt;
  &lt;/p&gt;
  &lt;p&gt;
    &lt;button type="submit"&gt;Send&lt;/button&gt;
  &lt;/p&gt;
&lt;/form&gt;</code></pre>

Done!

Do you want to transfer the data to your email account? Easy!

<pre><code class="php">&lt;?php form("contact", array("mailto"=>"name@domain.tld"));?&gt;
  ...
&lt;/form&gt;</code></pre>

<div class="notice notice-warning">
    <h4><i class="icon-lightbulb"></i> Info</h4>
    For now you need to include jQuery on the page you want to use the new form function.
</div>
