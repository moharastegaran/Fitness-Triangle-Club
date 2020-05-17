@foreach($program->items()->where('day',$day)->get() as $item)
    <tr>
        <td>
            <button type="button" class="btn btn-outline-danger btn-sm"  onclick="removeRow(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
        </td>
        <td>
            <select name="items[{{$index}}][%%INDEX%%][workout_ids][]" id="" class="form-control form-control-sm tagging workout_ids" multiple>
                @foreach($categories as $category)
                    <optgroup class="select2-result-selectable" label="{{ $category->title }}">
                        @foreach($category->workouts as $workout)
                            <option value="{{ $workout->id }}" @if(in_array($workout->id,json_decode($item->workout_ids))) selected @endif>{{ $workout->title }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" min="1" name="items[{{$index}}][%%INDEX%%][set]" autocomplete="off" value="{{ $item->set }}">
        </td>
        <td>
            <select class="form-control form-control-sm tagging repeat" name="items[{{$index}}][%%INDEX%%][repeat][]" multiple>
                @foreach(json_decode($item->repeat) as $repeat)
                    <option value="{{ $repeat }}" selected>{{ $repeat }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" name="items[{{$index}}][%%INDEX%%][rhythm]" autocomplete="off"  value="{{ $item->rhythm }}">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" name="items[{{$index}}][%%INDEX%%][gap]" autocomplete="off"  value="{{ $item->gap }}">
        </td>
        <td>
            <textarea class="form-control  form-control-sm" name="items[{{$index}}][%%INDEX%%][comment]" cols="40" autocomplete="off" rows="1">{{ $item->comment }}</textarea>
        </td>
    </tr>
@endforeach