<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <input type="text" name="name" id="name" placeholder="Your name" autocomplete="off" tabindex="1" class="txtinput">

        <input type="email" name="email" id="email" placeholder="Your e-mail address" autocomplete="off" tabindex="2" class="txtinput">

        <input type="url" name="website" id="website" placeholder="Website URL" autocomplete="off" tabindex="3" class="txtinput">

        <input type="tel" name="telephone" id="telephone" placeholder="Phone number?(optional)" tabindex="4" class="txtinput">

        <textarea name="message" id="message" placeholder="Enter a cool message..." tabindex="5" class="txtblock"></textarea>
        </section>
        <section id="aside" class="clearfix">
            <!--<section id="recipientcase">
            <h3>Recipient:</h3>
                <select id="recipient" name="recipient" tabindex="6" class="selmenu">
                    <option value="staff">Site Staff</option>
                    <option value="editor">Editor-in-Chief</option>
                    <option value="technical">Tech Department</option>
                    <option value="pr">Public Relations</option>
                    <option value="support">General Support</option>
                </select>
            </section>-->
            
            <!--<section id="prioritycase">
                <h3>Priority:</h3>
                <span class="radiobadge">
                    <input type="radio" id="low" name="priority" value="low">
                    <label for="low">Low</label>
                </span>
            
                <span class="radiobadge">
                    <input type="radio" id="med" name="priority" value="med" checked="checked">
                    <label for="med">Medium</label>
                </span>
            
                <span class="radiobadge">
                    <input type="radio" id="high" name="priority" value="high">
                    <label for="high">High</label>
                </span>
            </section>-->
        </section>
    </div>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Submit this!">
        <br style="clear:both;">
    </section>
</form>