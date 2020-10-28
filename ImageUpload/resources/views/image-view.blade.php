<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>image</th>

            </tr>
            </thead>


            <tbody>
            @foreach($image as $image)
            <tr>
                <td>
                <td><img width="100%" class="img-circle" src="{{ URL::asset('images'.$image->image) }}"></td>
                <img src="{{ asset($image->image) }}" alt="" height="100px" width="100px">


                </td>

            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
