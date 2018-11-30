<style>
       
        .ipf-gallery{
            width: 100%;
           background:rgb(255, 189, 10);
            padding: 3px 2px;
        }
        @media all and (max-width : 520px) {
            #pageHeader{
                padding: 20px;
                padding-top: 0;
                margin-bottom: 10px;
            }

            .ipf-gallery{
                /*top:-40px;*/
            }

            flickr-gallery-item {
                width: calc(50% - 8px) !important;
                min-width: calc(50% - 8px) !important;
            }
        }

        flickr-gallery > span{
            font-size: 2em;
            font-family: "Qanelas Bold", sans-serif;
        }
    </style>
<section class="ipf-gallery">
        <flickr-gallery user="'151356110@N07'">
            Loading images
        </flickr-gallery>
    </section>


@section('scripts')
    <script type="text/javascript" src="{{asset('bower_components/angular/angular.js')}}"></script>
    <script src="{{asset('bower_components/masonry/dist/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('bower_components/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-masonry-directive/src/angular-masonry-directive.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-flickr-api-factory/dist/angular-flickr-api-factory.js')}}"></script>
    {{--<script type="text/javascript" src="app/components/flickr-gallery/flickr-gallery-item.component.js"></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/flickr-gallery.component.js')}}"></script>--}}

    <!-- MY APP -->
    @verbatim
    <script type="text/javascript">
        var app = angular.module("fgallery",
            ['jtt_flickr', 'masonry']);

        app.component('flickrGalleryItem', {
            bindings: {
                photo: '<'
            },
            controller: FlickrGalleryItem,
            template: '<img ng-src="{{$ctrl.trustSrc($ctrl.url)}}" alt="">'
        });

        function FlickrGalleryItem($sce) {
            this.trustSrc = function(src) {
                return $sce.trustAsResourceUrl(src);
            }
        }

        FlickrGalleryItem.prototype = {
            $onInit: function(changes) {
                this.url = getMediumUrl(this.photo.url);
            }
        };

        function getMediumUrl(small) {
            return small.replace('_m.jpg', '.jpg');
        }

        app.component('flickrGallery', {
            bindings: {
                user : '<'
            },
            templateUrl: "assets/flickr-gallery.html",
            controller: FlickrGallery
        });

        function FlickrGallery(flickrFactory) {
            this.flickrFactory = flickrFactory;

            this.loaded = false;
            this.hasError = false;
            this.error = "";

            this.title = "";
            this.description = "";
            this.date = "";
            this.link = "";
            this.photos = [];
        }

        FlickrGallery.$inject = ['flickrFactory'];

        FlickrGallery.prototype = {
            $onInit: function() {
                this.loadPhotos();
            },
            loadPhotos: function() {
                var self = this;

                this.flickrFactory.getImagesFromUserById({
                    id: this.user, // username converter: http://idgettr.com/
                    lang: "en-us", // (optional) https://www.flickr.com/services/feeds/
                }).then(function(_response) {
                    // console.log(_response);
                    var res = _response.data;
                    self.loaded = true;
                    self.title = res.title;
                    self.date = res.modified;
                    self.link = res.link;
                    self.description = res.description;

                    var photos = res.items.map(function(p){
                        return {
                            title : p.title,
                            caption : p.description,
                            url: p.media.m,
                            // large_url: p.media.m.replace('_m.jpg', '_h.jpg'),
                            posted_on : p.published,
                            taken_on : p.date_taken,
                            flickr_link : p.link,
                            tags: p.tags
                        }
                    });

                    for (var i = 0; i < 8; i++) {
                        self.photos.push(photos[i]);
                    }
                }).catch(function(_err) {
                    self.loaded = true;
                    self.hasError = true;
                    self.error = _err;
                    console.log(_err);
                });
            }
        }
    </script>
    @endverbatim
@endsection