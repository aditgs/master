<style type="text/css">
    .select2-result-label .wrap:before{
    position:absolute;
    left:4px;
    font-family:fontAwesome;
    color:#999;
    content:"\f096";
    width:25px;
    height:25px;
    
}
.select2-result-label .wrap.checked:before{
    content:"\f14a";
}
.select2-result-label .wrap{
    margin-left:15px;
}

/* not required css */

.row
{
  padding: 10px;
}
    
</style>
<select multiple id="e1" style="width:300px">
        <option value="AL">Alabama</option>
        <option value="Am">Amalapuram</option>
        <option value="An">Anakapalli</option>
        <option value="Ak">Akkayapalem</option>
        <option value="WY">Wyoming</option>
    </select>
<input type="checkbox" id="checkbox" >Select All

<input type="button" id="button" value="check Selected">
<select multiple style="width: 300px;">
    <optgroup label="Alaskan/Hawaiian Time Zone">
        <option value="AK">Alaska</option>
        <option value="HI">Hawaii</option>
    </optgroup>
    <optgroup label="Pacific Time Zone">
        <option value="CA">California</option>
        <option value="NV">Nevada</option>
        <option value="OR">Oregon</option>
        <option value="WA">Washington</option>
    </optgroup>
    <optgroup label="Mountain Time Zone">
        <option value="AZ">Arizona</option>
        <option value="CO">Colorado</option>
        <option value="ID">Idaho</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NM">New Mexico</option>
        <option value="ND">North Dakota</option>
        <option value="UT">Utah</option>
        <option value="WY">Wyoming</option>
    </optgroup>
    <optgroup label="Central Time Zone">
        <option value="AL">Alabama</option>
        <option value="AR">Arkansas</option>
        <option value="IL">Illinois</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="OK">Oklahoma</option>
        <option value="SD">South Dakota</option>
        <option value="TX">Texas</option>
        <option value="TN">Tennessee</option>
        <option value="WI">Wisconsin</option>
    </optgroup>
    <optgroup label="Eastern Time Zone">
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="IN">Indiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="OH">Ohio</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WV">West Virginia</option>
    </optgroup>
</select>

<select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
    ...
  <option value="WY">Wyoming</option>
</select>

<div class="row">
  <select name="sel-01" id="sel-01" class="select2-multiple">
    <option></option>
    <option value="AL">Alabama</option>
    <option value="CA">California</option>
    <option value="NY">New York</option>
    <option value="TX">Texas</option>
    <option value="WY">Wyoming</option>
  </select>
</div>
 <div class="row">
  <select name="sel-02" id="sel-02" class="select2-multiple2">
    <option></option>
    <option value="AL">Alabama</option>
    <option value="CA">California</option>
    <option value="NY">New York</option>
    <option value="TX">Texas</option>
    <option value="WY">Wyoming</option>
  </select>
</div>
<div class="row">
  <select name="sel-03" id="sel-03" class="select2-original" multiple>
    <option></option>
    <option value="AL">Alabama</option>
    <option value="CA">California</option>
    <option value="NY">New York</option>
    <option value="TX">Texas</option>
    <option value="WY">Wyoming</option>
  </select>
</div>
