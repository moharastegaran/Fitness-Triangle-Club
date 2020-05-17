@foreach($program->items()->where('day',$day)->get() as $item)
    <tr>
        <td>
            <button type="button" class="btn btn-outline-danger btn-sm"  onclick="removeRow(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
        </td>
        <td>
            <select name="items[{{$index}}][%%INDEX%%][meal_id]" id="" class="form-control form-control-sm select2">
                <option value="" disabled selected>-انتخاب کنید-</option>
                @foreach($meals as $meal)
                    <option value="{{ $meal->id }}" @if($meal->id==$item->meal->id) selected @endif>{{ $meal->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="items[{{$index}}][%%INDEX%%][nutrition_id]" id="" class="form-control form-control-sm nutrition select2">
                <option value="" disabled selected>-انتخاب کنید-</option>
                @foreach($nutritions as $nutrition)
                    <option value="{{ $nutrition->id }}" @if($nutrition->id==$item->nutrition->id) selected @endif>{{ $nutrition->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control form-control-sm gram" name="items[{{$index}}][%%INDEX%%][gram]" value="{{ $item->gram }}" autocomplete="off">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm calorie" name="items[{{$index}}][%%INDEX%%][calorie]" value="{{ $item->calorie }}" readonly>
        </td>
    </tr>
@endforeach
