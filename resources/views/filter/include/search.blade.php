<form action="{{route('search')}}" method="get">
    @csrf


    <div id="items-area">
        <div class="item">
            <div class="row">
                <div class="col-md-3 form-group">

                    <select name="form[table][]" class="form-control " required="
                            ">


                        <option value="users">Users</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-check">

                        <select name="form[column][]" class="form-control column" required="">
                            @foreach(users_columns as $key=>$value)
                            <option value="{{$key}}" @if(request()->has('form')&&request()->form['column'][0]==$key) selected @endif >{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <select name="form[operator][]" class="form-control" required="">
                        @foreach(operators as $operator)
                        <option @if(request()->has('form')&&request()->form['operator'][0]==$operator) selected @endif>{{$operator}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 form-group">

                    <input  type="text"name="form[value][]"  class="form-control value"  @if(request()->has('form')) value="{{request()->form['value'][0]}}" @endif required>
                </div>

            </div>
        </div>
        @if(request()->has('form')&&count(request()->form['column'])>1)
        @for($step=1;$step< count(request()->form['column']);$step++)
        <div class="item">

            <div class="row">

                <div class="col-md-3 form-group">

                    <select name="form[table][]" class="form-control ">

                        <option value="users">Users</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-check">

                        <select name="form[column][]" class="form-control" required="">
                            @foreach(users_columns as $key=>$value)
                            <option value="{{$key}}" @if(request()->form['column'][$step]==$key) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <select name="form[operator][]" class="form-control" required="">
                        @foreach(operators as $operator)
                        <option @if(request()->form['operator'][$step]==$operator) selected @endif>{{$operator}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 form-group">

                    <input type="text"name="form[value][]" value="{{request()->form['value'][$step]}}" class="form-control value" required>
                </div>
                <div class="col-md-2 form-group">
                    <select name="form[contact][]" class="form-control" required="">

                        <option @if(request()->form['contact'][$step-1]=='AND') selected @endif>AND</option>
                        <option @if(request()->form['contact'][$step-1]=='OR') selected @endif>OR</option>

                    </select>
                </div> 
                <a href="javascript:void()" class="item-remove"><i class="fa fa-times-circle text-danger"></i></a>
            </div>
        </div>
        @endfor
        @endif
    </div>
    <button type="button" id="add-more" class="btn btn-outline-primary btn-sm mt-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add More</button>
    <div class="row">
        <div class=" mt-2 offset-md-10 col-md-2">
            <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-shopping-cart"></i> Search</button>
        </div>
    </div>
</form>

<div id="blind" style="display:none">
    <div class="item">
        <div class="row">

            <div class="col-md-3 form-group">

                <select name="form[table][]" class="form-control ">

                    <option value="users">Users</option>

                </select>
            </div>
            <div class="col-md-3">
                <div class="form-check">

                    <select name="form[column][]" class="form-control" required="">
                        @foreach(users_columns as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 form-group">
                <select name="form[operator][]" class="form-control" required="">
                    @foreach(operators as $operator)
                    <option >{{$operator}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 form-group">

                <input type="text"name="form[value][]"  class="form-control value" required>
            </div>
            <div class="col-md-2 form-group">
                <select name="form[contact][]" class="form-control" required="">

                    <option >AND</option>
                    <option >OR</option>

                </select>
            </div> 
            <a href="javascript:void()" class="item-remove"><i class="fa fa-times-circle text-danger"></i></a>
        </div>
    </div>
</div>

<style>
    .item {
        border: 1px dashed;
        padding: 10px;
        position: relative;
        margin-top: 20px !important;
    }

    .item-remove {
        position: absolute;
        top: -19px;
        right: -16px;
        font-size: 21px;
    }

</style>

@push('script')
<script>
    $(function () {


        $('#add-more').click(function () {
            $('#blind').find('.item').clone().appendTo('#items-area');
        });

        $(document).on('click', '.item-remove', function () {
            console.log('hi');

            if (!confirm("are you sure you want to remove section ?"))
                return false;
            $(this).closest('div.item').remove();

        });
//        $(document).on('change','.column',function(){
//            let column=$(this).val();
//            
//          
//            let stringfilds=['first_name','last_name','full_name','gender'];
//            let numberFields=['age','number_of_messages','user_id'];
//            if(stringfilds.includes(column)){
//                $(this).closest('div.row').find('.value').attr('type','text');
//               
//            }
//            else if(numberFields.includes(column)){
//                 $(this).closest('div.row').find('.value').attr('type','number');
//            }else{
//                  $(this).closest('div.row').find('.value').attr('type','date');
//            }
//        });
    });

</script>
@endpush
