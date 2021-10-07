@extends('layouts.master')

@section('content')


    <section class="section-contact-2 form">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    @foreach ($variations as $variation)
                        @if ($variation->name == 'Tradicinio formato nuotraukų dydžiai')
                            <h4>{{ $variation->name }}</h4>
                            @foreach ($variation->values()->get() as $value)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input cb" type="checkbox" value="{{ $value->price }}"
                                        id="customCheck-{{ $value->id }}" name="{{ $variation->id }}">

                                    <label class="custom-control-label"
                                        for="customCheck-{{ $value->id }}">{{ $value->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <script>
                        var valuetwo = 0;
                    </script>
                    @foreach ($variations as $variation)
                        @if ($variation->name != 'Tradicinio formato nuotraukų dydžiai')
                            <div class="foto-option mb-4">
                                <h4>{{ $variation->name }}</h4>
                                @foreach ($variation->values()->get() as $value)

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input cb2" type="checkbox"
                                            value="{{ $value->price }}" id="customCheck-{{ $value->id }}"
                                            name="{{ $variation->id }}" data-valuetwo="{{ $variation->id }}" />
                                        <label class="custom-control-label"
                                            for="customCheck-{{ $value->id }}">{{ $value->name }}
                                        </label>

                                    </div>

                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-6 col-md-12 my-tab">
                    <div style="align-items: center">
                        <div class="card-body">


                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 m-auto">
                                        <!-- File Input -->
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="upload-file" />
                                            <label for="upload-file" class="custom-file-label">
                                                 Pasirinkite nuotrauką
                                            </label>
                                        </div>
                    
                                        <!-- Canvas -->
                                        <div id="wrapper" class="wrapper-single">
                                            <div id="map">
                                            <canvas id="canvas"></canvas>
                                            </div>
                                        </div>
                
                    
                                    <div>
                                        <span>Didinti</span>
                                        <input type="range" min="1" max="4" value="1" step="0.1" id="zoomer" class="slider" oninput="deepdive()">
                    
                                    </div>
                                            
                                            
                    
                                        <!-- Filter Options -->
                                        <h4 class="text-center my-3">Filtrai</h4>
                                        <div class="row text-center my-4">
                                            <div class="col-md-6 my-2">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="filter-btn brightness-remove btn btn-info">
                                                        -
                                                    </button>
                                                    <button class="btn btn-secondary btn-disabled">
                                                        Ryškumas
                                                    </button>
                                                    <button class="filter-btn brightness-add btn btn-info">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="filter-btn contrast-remove btn btn-info">
                                                        -
                                                    </button>
                                                    <button class="btn btn-secondary btn-disabled">Kontrastas</button>
                                                    <button class="filter-btn contrast-add btn btn-info">+</button>
                                                </div>
                                            </div>
                                          
                                    
                                        </div>
                    
                                        <!-- Effect Options -->
                                        <h4 class="text-center my-3">Efektai</h4>
                                        <div class="row mb-6">
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn vintage-add btn btn-dark btn-block">
                                                    Vintage
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn lomo-add btn btn-dark btn-block">
                                                    Lomo
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn clarity-add btn btn-dark btn-block">
                                                    Clarity
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn sincity-add btn btn-dark btn-block">
                                                    Sin City
                                                </button>
                                            </div>
                                        </div>
                    
                                        <!-- a new row -->
                                        <div class="row">
                                            <div class="col-md-6 my-2">
                                                <button
                                                    class="filter-btn crossprocess-add btn btn-dark btn-block"
                                                >
                                                    Cross Process
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn pinhole-add btn btn-dark btn-block">
                                                    Pinhole
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn nostalgia-add btn btn-dark btn-block">
                                                    Nostalgia
                                                </button>
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <button class="filter-btn hermajesty-add btn btn-dark btn-block">
                                                    Her Majesty
                                                </button>
                                            </div>
                                        </div>
                    
                                        <div class="row my-5">
                                            <!-- DOwnload Image -->
                                            <div class="col-md-12 my-2">
                                                <button id="download-btn" class="btn btn-primary btn-block">
                                                    Atsisiųsti nuotrauką
                                                </button>
                                            </div>
                                            <!-- Remove Filters and Effects from image -->
                                            <div class="col-md-12 my-2">
                                                <button id="revert-btn" class="btn btn-danger btn-block">
                                                    Ištrinti filtrus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('builder.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            
                                 

                                <div>
                                    <button class="btn btn-primary" type="submit">Į krepšelį</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-12 foto-description">
                    <div class="foto-info  p-3">
                        <h5>Informacija</h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, nesciunt? Accusantium rem
                        aliquam, nesciunt praesentium dolore expedita quas totam corporis nulla id? In quibusdam,
                        inventore
                        recusandae culpa expedita magni accusantium!
                    </div>
                    <div class="foto-order p-3">
                        <h5>Kaina:<input type="text" name="total" value="" size="30" id="total" class="custom-price-input" disabled="disabled">
                        </h5>
                        <button class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script type="text/javascript">

Draggable.create("#map canvas", {
   type:"x,y",
	   bounds:"#wrapper",
	   edgeResistance:0.5
});

//$('#canvas').draggable();

//$( "#canvas" ).draggable({ containment: "window" });

// (function($) {
//     $.fn.drags = function(opt) {

//       opt = $.extend({cursor:"move",container:false}, opt);

//         var $el = this;
        
//         return $el.css('cursor', opt.cursor).on("mousedown", function(e) {
//             var $drag = $(this).addClass('draggable');
            
//             var z_idx = $drag.css('z-index'),
//                 drg_h = $drag.outerHeight(),
//                 drg_w = $drag.outerWidth(),
//                 pos_y = $drag.offset().top + drg_h - e.pageY,
//                 pos_x = $drag.offset().left + drg_w - e.pageX;
//             $drag.css('z-index', 1000);
//             $(document).on("mousemove", function(e) {
//               t = e.pageY + pos_y - drg_h;
//               l = e.pageX + pos_x - drg_w;
//               if(!!opt.container) {
//                 var $c = $(opt.container),
//                     co = $c.offset(),
//                     cw = $c.width(),
//                     ch = $c.height();
//                 if(t < co.top) t = co.top;
//                 if(t + drg_h > ch + co.top) t = ch + co.top - drg_h;
//                 if(l < co.left) l = co.left;
//                 if(l + drg_w > cw + co.left) l = cw + co.left - drg_w;
//               }
//               $('.draggable').offset({
//                     top:t,
//                     left:l
//                 }).on("mouseup", function() {
//                     $(this).removeClass('draggable').css('z-index', z_idx);
//                 });
//             });
//             e.preventDefault(); // disable selection
//         }).on("mouseup", function() {
//           $(this).removeClass('draggable');
//         });
      
//     }
// })(jQuery);

//$('#map').drags({container: ".limit"});

    
    const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

let img = new Image();
let fileName = "";

const downloadBtn = document.getElementById("download-btn");
const uploadFile = document.getElementById("upload-file");
const revertBtn = document.getElementById("revert-btn"); 

// Filter & Effect Handlers
document.addEventListener("click", (e) => {
	if (e.target.classList.contains("filter-btn")) {
		// Brightness
		if (e.target.classList.contains("brightness-add")) {
			Caman("#canvas", img, function () {
				this.brightness(5).render();
			});
		} else if (e.target.classList.contains("brightness-remove")) {
			Caman("#canvas", img, function () {
				this.brightness(-5).render();
			});
		}
		// Contrast
		else if (e.target.classList.contains("contrast-add")) {
			Caman("#canvas", img, function () {
				this.contrast(5).render();
			});
		} else if (e.target.classList.contains("contrast-remove")) {
			Caman("#canvas", img, function () {
				this.contrast(-5).render();
			});
		}
		// Saturation
		else if (e.target.classList.contains("saturation-add")) {
			Caman("#canvas", img, function () {
				this.saturation(5).render();
			});
		} else if (e.target.classList.contains("saturation-remove")) {
			Caman("#canvas", img, function () {
				this.saturation(-5).render();
			});
		}
		// Vibrance
		else if (e.target.classList.contains("vibrance-add")) {
			Caman("#canvas", img, function () {
				this.vibrance(5).render();
			});
		} else if (e.target.classList.contains("vibrance-remove")) {
			Caman("#canvas", img, function () {
				this.vibrance(-5).render();
			});
		}
		// Vintage
		else if (e.target.classList.contains("vintage-add")) {
			Caman("#canvas", img, function () {
				this.vintage().render();
			});
		}
		// Lomo
		else if (e.target.classList.contains("lomo-add")) {
			Caman("#canvas", img, function () {
				this.lomo().render();
			});
		}
		// Clarity
		else if (e.target.classList.contains("clarity-add")) {
			Caman("#canvas", img, function () {
				this.clarity().render();
			});
		}
		// Sin City
		else if (e.target.classList.contains("sincity-add")) {
			Caman("#canvas", img, function () {
				this.sinCity().render();
			});
		}
		// Cross Process
		else if (e.target.classList.contains("crossprocess-add")) {
			Caman("#canvas", img, function () {
				this.crossProcess().render();
			});
		}
		// Pinhole
		else if (e.target.classList.contains("pinhole-add")) {
			Caman("#canvas", img, function () {
				this.pinhole().render();
			});
		}
		// Nostalgia
		else if (e.target.classList.contains("nostalgia-add")) {
			Caman("#canvas", img, function () {
				this.nostalgia().render();
			});
		}
		// Her Majesty
		else if (e.target.classList.contains("hermajesty-add")) {
			Caman("#canvas", img, function () {
				this.herMajesty().render();
			});
		}
	}
});

var zoomer = document.getElementById('zoomer');
var hubblepic = document.getElementById('map');

function deepdive(){ 
	zoomlevel = zoomer.valueAsNumber;
  hubblepic.style.webkitTransform = "scale("+zoomlevel+")";
	hubblepic.style.transform = "scale("+zoomlevel+")";
}

// Revert Filters
revertBtn.addEventListener("click", (e) => {
	Caman("#canvas", img, function () {
		this.revert();
	});
});

// Upload File
uploadFile.addEventListener("change", () => {
	// Get File
	const file = document.getElementById("upload-file").files[0];

	// Initialize FileReader API
	const reader = new FileReader();

	// Check for file
	if (file) {
		// Set File Name
		fileName = file.name;

		// Read Data as URL
		reader.readAsDataURL(file);
	}

	// Add Image to Canvas
	reader.addEventListener(
		"load",
		() => {
			img = new Image();

			// Set Image Source
			img.src = reader.result;

			// Add Image to Canvas when onload
			img.onload = function () {
				canvas.width = img.width;
				canvas.height = img.height;
				ctx.drawImage(img, 0, 0, img.width, img.height);
				canvas.removeAttribute("data-caman-id");
			};
		},
		false
	);
});

// Download Event
downloadBtn.addEventListener("click", () => {
	// Get File Extension
	const fileExtension = fileName.slice(-4);

	// Initialize New Filename
	let newFileName;

	// Check Image Extension
	if (fileExtension === ".jpg" || fileExtension === ".png") {
		// Add '-edited.png' to the original file name
		newFileName = fileName.substring(0, fileName.length - 4) + "-edited.png";
	}

	download(canvas, newFileName);
});

// Download
function download(canvas, filename) {
	// Initialize Event
	let e;

	// Create Link
	const link = document.createElement("a");

	// Set Props
	link.download = filename;
	link.href = canvas.toDataURL("image/png", 0.8);

	// New Mouse Event
	e = new MouseEvent("click");

	// Dispatch Event
	link.dispatchEvent(e);
}


//          // target elements with the "draggable" class
// interact('.draggable')
//   .draggable({
//     // enable inertial throwing
//     inertia: true,
//     // keep the element within the area of it's parent
//     modifiers: [
//       interact.modifiers.restrictRect({
//         restriction: 'parent',
//         endOnly: true
//       })
//     ],
//     // enable autoScroll
//     autoScroll: true,

//     listeners: {
//       // call this function on every dragmove event
//       move: dragMoveListener,

//       // call this function on every dragend event
//       end (event) {
//         var textEl = event.target.querySelector('p')

//         textEl && (textEl.textContent =
//           'moved a distance of ' +
//           (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
//                      Math.pow(event.pageY - event.y0, 2) | 0))
//             .toFixed(2) + 'px')
//       }
//     }
//   })

// function dragMoveListener (event) {
//   var target = event.target
//   // keep the dragged position in the data-x/data-y attributes
//   var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
//   var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

//   // translate the element
//   target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

//   // update the posiion attributes
//   target.setAttribute('data-x', x)
//   target.setAttribute('data-y', y)
// }

// // this function is used later in the resizing and gesture demos
// window.dragMoveListener = dragMoveListener

        // let data = {!! json_encode($variations, JSON_HEX_TAG) !!};

        // data.forEach(function(data) {
        //     console.log(Object.values(data));
        // });

        // let result = data.filter(obj => {
        // return obj.id === 1;
        // })        
        // console.log(data[Object.keys(data)[0]]);

        // var urls = []
        // data.id.forEach(function(e) {
        //     urls.push(e.alt_sizes[0]['url']);
        // });
        // console.log(urls);





        $('input:checkbox.cb').click(function() {
            if ($(this).prop("checked") == true) {
                $('.cb').removeClass('check-selected');
                $('.cb').addClass('check-unselected');
                $(this).addClass('check-selected');

            }
        });

        $('input:checkbox.cb').click(function() {
            if ($(this).prop("checked") == true) {
                $('.cb').removeClass('check-selected');
                $('.cb').addClass('check-unselected');
                $(this).addClass('check-selected');
                $('.cb').prop("checked", false);
                $(this).prop("checked", true);
            }
        });

       

        $('.cb2').each(function() {
            //console.log($(this).attr('data-valuetwo'));
            //let id = $((this).attr('data-valuetwo'));
            var id = $(this).attr("data-valuetwo");
            console.log(id);
            $('input:checkbox.cb2').click(function() {
                 if (!$(this).hasClass(id)) {
                    $(this).addClass(id);
                 }
                 else {
                    $(this).removeClass(id);
                 }

                //  if ($(this).prop("checked") == true) {
                // $('.cb2').addClass('check-selected');
                // $('.cb2').removeClass('check-unselected');
                // $(this).addClass('check-selected');
                // $('.cb2').prop("checked", true);
            //}
            });

            // $('input:checkbox.cb2').click(function() {
            // if ($(this).prop("checked") == false) {
            //     $('.cb2').removeClass('check-selected');
            //     $('.cb2').addClass('check-unselected');
            //     $(this).addClass('check-selected');
            //     $('.cb2').prop("checked", false);
         //   }
        //});
        });

        


        $('input:checkbox').change(function() {
            var total = 0;
            $('input:checkbox:checked').each(function() {
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            });
            $("#total").val(total);

        });

        /* Canvas */
 

    </script>

@endsection
