        @csrf
        <div class="form-group">
            <label for="q-title">Title</label>
            <input type="text" value="{{ old('title',$question->title) }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" id="q-title" aria-describedby="helpId" placeholder="" >

            @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="q-body">Content</label>
            <textarea name="body" id="q-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}">{{ old('body',$question->body) }}</textarea>
            @if ($errors->has('body'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('body') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group" align="center">
            <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
        </div>