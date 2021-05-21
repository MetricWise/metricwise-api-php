<form method="post" action="send_data.php">
<table cellspacing="0" cellpadding="0" border="0" id="demo-form">
<tbody><tr><td align="left" class="layout-cell">
    <table cellspacing="0" cellpadding="0" border="0"><tbody><tr>
    <td valign="top" align="left">Name: <span class="required">*</span><br><input type="text" name="user_name" class="text-field"></td>
    <td class="spacer-cell"></td>
    <td valign="top" align="left">Address:<br><input type="text" name="address" class="text-field"></td>
    </tr></tbody></table>
</td></tr>
<tr><td align="left" class="layout-cell">
    <table cellspacing="0" cellpadding="0" border="0"><tbody><tr>
    <td valign="top" align="left">City:<br><input type="text" name="city" class="text-field"></td>
    <td class="spacer-cell"></td>
    <td valign="top" align="left">Zip Code:<br><input type="text" name="zip" class="text-field"></td>
    </tr></tbody></table>
</td></tr>
<tr><td align="left" class="layout-cell">
    <table cellspacing="0" cellpadding="0" border="0"><tbody><tr>
    <td valign="top" align="left">Email: <span class="required">*</span><br><input type="text" name="email" class="text-field"></td>
    <td class="spacer-cell"></td>
    <td valign="top" align="left">Phone: <span class="required">*</span><br><input type="text" name="phone" class="text-field"></td>
    </tr></tbody></table>
</td></tr>
<tr><td align="left" class="layout-cell">
    <b>Interested In:</b><br>
    <table cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
        <td align="left" class="check-layout"><input type="checkbox" id="windows" value="Windows" name="interests[]"> <label for="windows">Windows</label></td>
        <td align="left"><input type="checkbox" id="doors" value="Doors" name="interests[]"> <label for="doors">Doors</label></td>
    </tr>
    <tr>
        <td align="left" class="check-layout"><input type="checkbox" id="vinyl" value="Vinyl Siding" name="interests[]"> <label for="vinyl">Vinyl Siding</label></td>
        <td align="left"><input type="checkbox" id="other" value="Other" name="interests[]"> <label for="other">Other</label></td>
    </tr>
    </tbody></table>
</td></tr>
<tr>
    <td valign="top" align="left" class="layout-cell">
        Num. Windows Needed:
        <select name="num_windows">
        <option value=""></option>
        <option value="1 - 3">1 - 3</option>
        <option value="4 - 6">4 - 6</option>
        <option value="7 - 12">7 - 12</option>
        <option value="13 - 17">13 - 17</option>
        <option value="18 - 23">18 - 23</option>
        <option value="24 - 29">24 - 29</option>
        <option value="30 or more">30 or more</option>
        <option value="Undecided">Undecided</option>
        </select>
    </td>
</tr>
<tr>
    <td valign="top" align="left" class="layout-cell">
        How Did You Hear About Us:<br>
        <select name="hear_about" class="text-field">
        <option value=""></option>
        <option value="Auto Racing Sponsorship">Auto Racing Sponsorship</option>
        <option value="Billboard">Billboard</option>
        <option value="Corporate Email">Corporate Email</option>
        <option value="Newspaper">Newspaper</option>
        <option value="Val Pack">Val Pack</option>
        <option value="Job Sign">Job Sign</option>
        <option value="Referral">Referral</option>
        <option value="Television">Television</option>
        <option value="Radio">Radio</option>
        <option value="Internet Search">Internet Search</option>
        <option value="Yellow Pages">Yellow Pages</option>
        <option value="Other">Other</option>
        </select>
    </td>
</tr>
<tr>
    <td valign="top" align="left" class="layout-cell">Comments:<br><textarea rows="4" name="comment"></textarea></td>
</tr>
<tr>
    <td align="center">
        <input type="image" alt="Submit Request" src="http://www.windowworld.net/images/button-submit-form.gif" class="submit-button">
        <input type="hidden" value="submit" name="submit">
    </td>
</tr>
</tbody></table>
</form>