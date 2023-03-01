<div class="form-group">
    <label for="name">Company name</label>
    <input class="form-control" type="text" placeholder="Company name" id="name" name="name"
           value="{{old('company_name',$workspace->company_name)}}">
</div>
<div class="form-group">
    <label for="name">Company address</label>
    <input class="form-control" type="text" placeholder="Company address" id="address" name="address"
           value="{{old('company_address',$workspace->company_address)}}">
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" class="form-control" id="phone" placeholder="phone number" name="phone"
           value="{{old('phone',$workspace->phone)}}">
</div>
<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email"
           value="{{old('email',$workspace->email)}}">
</div>
<div class="form-group">
    <label for="logo">Company's logo</label>
    <input type="file" class="form-control-file" id="logo" name="logo"
           value="{{old('logo',$workspace->logo)}}">
</div>
<div class="form-group">
    <label for="facebook">Facebook</label>
    <input type="text" class="form-control" id="facebook" placeholder="facebook" name="facebook"
           value="{{old('facebook',$workspace->facebook)}}">
</div>
<div class="form-group">
    <label for="instagram">Instagram</label>
    <input type="text" class="form-control" id="instagram" placeholder="instagram" name="instagram"
           value="{{old('instagram',$workspace->instagram)}}">
</div>
<div class="form-group">
    <label for="linkedin">Linkedin</label>
    <input type="text" class="form-control" id="linkedin" placeholder="linkedin" name="linkedin"
           value="{{old('linkedin',$workspace->linkedin)}}">
</div>
<div class="form-group">
    <label for="twitter">Twitter</label>
    <input type="text" class="form-control" id="twitter" placeholder="twitter" name="twitter"
           value="{{old('twitter',$workspace->twitter)}}">
</div>
<div class="form-group">
    <label for="webpage">Webpage</label>
    <input type="text" class="form-control" id="webpage" placeholder="webpage" name="webpage"
           value="{{old('webpage',$workspace->webpage)}}">
</div>
<input class="btn btn-primary" type="submit" value="Submit">
