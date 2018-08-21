<html lang="en">

<head>

    <title>Laravel 5.6 - import export data into excel and csv using maatwebsite </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

</head>



<body>



<div class="container">

<div class="panel panel-primary">

 <div class="panel-heading">Laravel 5.6 - import export data into excel and csv using maatwebsite </div>

  <div class="panel-body"> 

  <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">

        <a href="{{ route('export.file',['type'=>'xls']) }}">Download Excel xls</a> |

        <a href="{{ route('export.file',['type'=>'xlsx']) }}">Download Excel xlsx</a> |

        <a href="{{ route('export.file',['type'=>'csv']) }}">Download CSV</a>

      </div>

   </div>     

<form method="POST" action="{{route('import.file')}}">
{{ csrf_field() }}
        <div class="row">

           <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
<label class="col-md-3">Select File to Import</label>
                    <div class="col-md-9">
<input type="file" name="sample_file" class="form-control">
                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Upload</button>

            </div>

        </div>
       </form>

 </div>

</div>

</div>



</body>

</html>