@include('common.header')
<h2>Create a New Topic</h2>
<form method="POST" action="/topic/save">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="topic_cat">Topic Category:</label>
        <select name="topic_cat">
            <option value="">--Select Category--</option>
            @foreach($categories as $category)
                <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="topic_subject">Topic Subject:</label>
        <input type="text" class="form-control" id="topic_subject" name="topic_subject">
    </div>

    <div class="form-group">
        <label for="topic_message">Topic Message:</label>
        <input type="text" class="form-control" id="topic_message" name="topic_message">
    </div>
    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@include('common.footer')
