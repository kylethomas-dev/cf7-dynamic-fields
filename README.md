# cf7-dynamic-fields

<h2>Add Dynamic Fields to Contact Form 7</h2>

<strong>Purpose</strong>

<p>Dynamically add additional fields to a contact form created using the WordPress plugin Contact  Form 7.</p>

<strong>Why</strong>

<p>I ran into a situation where I needed to dynamically add additional fields to a contact form based on url paramaters. Using the method outlined below, I am not able to add additional fields to Contact Form 7 based on a number of parameters including; if, else, $_Get and more.</p>

<strong>Prerequisites</strong>

<p>This method requires self-hosted WordPress <a href="https://wordpress.org" target="_blank">(download)</a> to be installed and using Contact Form 7 <a href="https://en-au.wordpress.org/plugins/contact-form-7/" target="_blank">(Download)</a>. JQuery is required for this to work. Knowledge of template management required.</p>

<strong>Method</strong>
<strong>Step 1</strong>

<p>Create your form using the Contact Form 7 plugin, can be any form you like. Add an empty div inside your form, in this example I am using a div with the id 'dynamic-fields'.</p>

```
<form>
    <div class="form-group">
        <label for="full-name">Name</label>
        [text* full-name class:form-control class:bg-grey-control placeholder "First & Last Name"]
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        [email* email class:form-control class:bg-grey-control placeholder "Email Address"]
    </div>

    <div id="dynamic-fields"></div>

    [submit class:btn class:btn-orange-small "Send Message"]
</form>
```

<strong>Step 2</strong>

<p>Add your form to your template file using the Contact Form 7 shortcode.</p>

```
<?php echo do_shortcode('[contact-form-7 id="2" title="Contact"]'); ?>
```

<strong>Step 3</strong>

<p>Now the magic begins. We will be using JQuery to prepend our dynamic fields into our empty div we setup in Step 1. The prepend method allows us to add content at the beginning of our 'dynamic-fields' div <a href="#">(more information)</a>. Simply copy the code below and modify it according to your needs. The field is added as the page is loaded. We can even wrap this code within an if statement for dynamic loading.</p>

```
<script>
  $(document).ready(function() {
      $("#dynamic-fields").prepend("<input type='text' name='dynamic-field' id='dynamic-field'>");
  });
</script>
```

<strong>Step 4</strong>

<p>When the contact page is loaded up, you should now see your dynamic field being loaded. However, the field is not yet being output by Contact Form 7. We need to add our field to the Contact Form 7 Mail output for it to display within sent mail. Luckily, this is very easy. Simply open your form within Contact Form 7 and go to the Mail tab. Within your Messsage Body add the name of your field, inside square brackets. E.g. [dynamic-field].</p>

```
From: [full-name] <[email]>
Subject: [subject]

Message Body:
[your-message]

[dynamic-field]
```

<p><i>Note: Usually, Contact Form 7 will display all the available fields just above the To section. Dynamic fields added with JQuery do not display here, since they are not created within Contact Form 7.</i></p>

<strong>Step 5</strong>

<p>Send an email! Your field should display in your inbox when mail is received. Try experimenting by adding more fields or wrapping the script within an if statement.</p>
