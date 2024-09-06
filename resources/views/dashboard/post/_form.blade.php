@csrf

    <label for="title">Title</label>
    <input class="form-control" type="text" name="title" value="{{old("title",$post->title)}}">

    <label for="slug">Slug</label>
    <input class="form-control" type="text" name="slug" value="{{old("slug", $post->slug)}}">
    
    <label for="">Categoria</label>
    <select name="category_id">
        {{-- el title es la key y el id es el value que se manda en el post, asi funciona ese foreach --}}
        @foreach ($categories as $title => $id)
        <option {{ old("category_id","",$post->category_id) == $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>

    <label for="">Posted</label>
    <select name="posted">
        <option {{ old("posted","",$post->posted) == "not" ? "selected" : ""}} value="not">No</option>
        <option {{ old("posted","",$post->posted) == "yes" ? "selected" : ""}} value="yes">Yes</option>
    </select>

    <label for="content">Content</label>
    <input class="form-control" type="text" name="content" value="{{old("content","sin content",$post->content)}}">
    
    <label for="description">Description</label>
    <input class="form-control" type="text" name="description" value="{{old("description","sin description",$post->description)}}">

    @if (isset($task) && $task == "edit")
    <label for="">Imagen</label>
    <input type="file" name="image" >
    @endif

    <button class="btn btn-primary mt-4" type="submit">Enviar</button>