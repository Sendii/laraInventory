<link rel="stylesheet" href="{{asset('css/select2.min.css')}}"> @include('layouts.sidebar')
<div class="content-wrapper">
  <div class="container-fluid spark-screen">
    <br>
    <div class="col-md-10 col-md-offset-1">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <div class="btn-group">
          </div>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <br>
        <center>
          <h4>Peminjaman Barangs.</h4></center>
          <br>
          <div class="box-body">

            <form method="POST" action=" {{url('barang/peminjaman/save')}} ">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$barang->id}}">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <label class="col-sm-2 control-label">Stock Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="stock" value="{{$barang->qty}}" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah yg ingin dipinjam</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="number" class="form-control" name="jumlah" value="" placeholder="Jumlah" max="{{$barang->qty - 1}}">
                  </div>
                  <br>
                </div>
                <label class="col-sm-2 control-label">Keterangan Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="keterangan" value="{{$barang->status}}" placeholder="Keterangan Barang" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Peminjam</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <select name="namapeminjam" class="form-control select2" required>
                    	<option value="">Pilih Peminjam</option>
                      @foreach($siswas as $siswa)
                      <option value="{{ $siswa->id }}">{{ $siswa->nama }}  ||  {{$siswa->Kelas->kelas}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Peminjam</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <input id="myInput" type="text" name="myCountry" placeholder="Country" placeholder="form-control">
                  </select>
                </div>
              </div>
              <br>
              <br>
            </div>
            <div>
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;  Pinjam</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>

<script>
  function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false;}
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function(e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
            });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
    });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = [
  @foreach($siswas as $siswa)
  [ "{{ $siswa->nama }}", "{{$siswa->Kelas->kelas}}" ],
  @endforeach
];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>