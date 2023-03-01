<div class="form-group">
    <label for="name">Appstatus name</label>
    <input class="form-control" type="text" placeholder="Appstatus name" id="name" name="name"
           value="{{old('name', $appstatus->name)}}">

</div>
<div class="form-group">
    <label for="description">Description</label>
    <input class="form-control" type="text" placeholder="Description" id="description" name="description"
           value="{{old('description', $appstatus->description)}}">
</div>
<div class="form-group">
    <label for="logo_path">Logo</label>
    <input type="file" class="form-control" id="logo_path" name="logo_path"
           value="{{old('logo_path', $appstatus->logo_path)}}">
</div>
<div class="form-group">
    <input class="form-check-input" type="checkbox" name="is_visible"
           value="is_visible" id="is_visible"
        {{(old('is_visible', $appstatus->is_visible)) == '1' ? 'checked' : ''}}
    >
    <label class="form-check-label" for="is_visible">
        Others can see this page?
    </label>
</div>

<input class="btn btn-primary" type="submit" value="Edit">
