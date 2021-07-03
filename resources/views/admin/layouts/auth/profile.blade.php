@extends('admin.includes.app')

@section('title', 'AIRSHIPT | Profile')
@section('styles')
<style>
    .profileImageStyle2 {
        font-family: Arial, Helvetica, sans-serif;
        width: 6rem;
        height: 6rem;
        border-radius: 50%;
        border: 6px solid #FFFFFF;
        background: #1c84c6;
        font-size: 2rem;
        color: #fff;
        text-align: center;
        line-height: 5rem;
        margin: 0.25rem 0;
    }

    .avatar_upload {
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 30px;
        top: 0px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: #ffffff;
        box-shadow: 0px 0px 13px 0px rgb(0 0 0 / 10%);
        transition: all 0.3s;
    }

    .avatar_upload i {
        color: #5d78ff;
        margin-bottom: 7px;
        margin-left: 5px;
        font-size: 0.8rem;
    }

    .avatar_upload input {
        width: 0 !important;
        height: 0 !important;
        overflow: hidden;
        opacity: 0;
    }

    .avatar_upload:hover {
        transition: all 0.3s;
        background-color: #5d78ff;
    }

    .avatar_upload:hover i {
        color: white;
    }

    .position-relative {
        position: relative;
    }
</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Extra Pages</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">


    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">

            <div class="profile-image">
                <div class="position-relative">
                    @if($auth->profile_image_url)

                    <div class="avatar_holder">
                        <img alt="image" class="rounded-circle circle-border m-b-md" src="{{asset('assets/uploads/profile/'.$auth->profile_image_url)}}" />
                    </div>

                    @else
                    <div class="avatar_holder">
                        <div class="profileImage profileImageStyle2"></div>
                    </div>

                    @endif
                    <label class="avatar_upload">
                        <form id="profilePicForm">
                            @csrf
                            @method('POST')
                            <i class="fas fa-pencil-alt"></i>
                            <input type="file" name="profile_pic" id="profile_pic" accept=".png, .jpg, .jpeg">
                        </form>
                    </label>
                </div>
                <button type="button" id="saveProfilePic" class="btn btn-primary btn-sm ml-4 mb-2 d-none" onclick="event.preventDefault();
                $('#profilePicForm').submit();">Save</button>
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ $auth->name }}
                        </h2>
                        <h4>Founder of Groupeq</h4>
                        <small>
                            There are many variations of passages of Lorem Ipsum available, but the majority
                            have suffered alteration in some form Ipsum available.
                        </small>
                    </div>
                    <small id="profile_pic-error" class="text-danger text-center"></small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                    <tr>
                        <td>
                            <strong>142</strong> Projects
                        </td>
                        <td>
                            <strong>22</strong> Followers
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>61</strong> Comments
                        </td>
                        <td>
                            <strong>54</strong> Articles
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>154</strong> Tags
                        </td>
                        <td>
                            <strong>32</strong> Friends
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <small>Sales in last 24h</small>
            <h2 class="no-margins">206 480</h2>
            <div id="sparkline1"></div>
        </div>


    </div>
    <div class="row">

        <div class="col-lg-3">

            <div class="ibox">
                <div class="ibox-content">
                    <h3>About {{ $auth->name }}</h3>

                    <p class="small">
                        There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form, by injected humour, or randomised words which don't.
                        <br />
                        <br />
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing
                    </p>

                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-navy"></i> Online status</span>
                    </p>

                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content">
                    <h3>Followers and friends</h3>
                    <p class="small">
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing
                    </p>
                    <div class="user-friends">
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a3.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a1.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a2.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a4.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a5.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a6.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a7.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a8.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a2.jpg')}}"></a>
                        <a href=""><img alt="image" class="rounded-circle" src="{{asset('assets/img/a1.jpg')}}"></a>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content">
                    <h3>Personal friends</h3>
                    <ul class="list-unstyled file-list">
                        <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                        <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                        <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                        <li><a href=""><i class="fa fa-file-powerpoint-o"></i> Presentation.pptx</a></li>
                        <li><a href=""><i class="fa fa-file"></i> 10_08_2015.docx</a></li>
                    </ul>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content">
                    <h3>Private message</h3>

                    <p class="small">
                        Send private message to Alex Smith
                    </p>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="email" class="form-control" placeholder="Message subject">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary btn-block">Send</button>

                </div>
            </div>

        </div>

        <div class="col-lg-5">

            <div class="social-feed-box">

                <div class="float-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li><a href="#">Config</a></li>
                    </ul>
                </div>
                <div class="social-avatar">
                    <a href="" class="float-left">
                        <img alt="image" src="{{asset('assets/img/a1.jpg')}}">
                    </a>
                    <div class="media-body">
                        <a href="#">
                            Andrew Williams
                        </a>
                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                    </div>
                </div>
                <div class="social-body">
                    <p>
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>

                    <div class="btn-group">
                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                    </div>
                </div>
                <div class="social-footer">
                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a1.jpg')}}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew Williams
                            </a>
                            Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                            <br />
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                            <small class="text-muted">12.06.2014</small>
                        </div>
                    </div>

                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a2.jpg')}}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew Williams
                            </a>
                            Making this the first true generator on the Internet. It uses a dictionary of.
                            <br />
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                            <small class="text-muted">10.07.2014</small>
                        </div>
                    </div>

                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a3.jpg')}}">
                        </a>
                        <div class="media-body">
                            <textarea class="form-control" placeholder="Write comment..."></textarea>
                        </div>
                    </div>

                </div>

            </div>

            <div class="social-feed-box">

                <div class="float-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li><a href="#">Config</a></li>
                    </ul>
                </div>
                <div class="social-avatar">
                    <a href="" class="float-left">
                        <img alt="image" src="{{asset('assets/img/a6.jpg')}}">
                    </a>
                    <div class="media-body">
                        <a href="#">
                            Andrew Williams
                        </a>
                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                    </div>
                </div>
                <div class="social-body">
                    <p>
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>
                    <p>
                        Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>
                    <img src="{{asset('assets/img/gallery/3.jpg')}}" class="img-fluid">
                    <div class="btn-group">
                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                    </div>
                </div>
                <div class="social-footer">
                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a1.jpg')}}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew Williams
                            </a>
                            Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                            <br />
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                            <small class="text-muted">12.06.2014</small>
                        </div>
                    </div>

                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a2.jpg')}}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew Williams
                            </a>
                            Making this the first true generator on the Internet. It uses a dictionary of.
                            <br />
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                            <small class="text-muted">10.07.2014</small>
                        </div>
                    </div>

                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a8.jpg')}}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew Williams
                            </a>
                            Making this the first true generator on the Internet. It uses a dictionary of.
                            <br />
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                            <small class="text-muted">10.07.2014</small>
                        </div>
                    </div>

                    <div class="social-comment">
                        <a href="" class="float-left">
                            <img alt="image" src="{{asset('assets/img/a3.jpg')}}">
                        </a>
                        <div class="media-body">
                            <textarea class="form-control" placeholder="Write comment..."></textarea>
                        </div>
                    </div>

                </div>

            </div>




        </div>
        <div class="col-lg-4 m-b-lg">
            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon navy-bg">
                        <i class="fa fa-briefcase"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Meeting</h2>
                        <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                        </p>
                        <a href="#" class="btn btn-sm btn-primary"> More info</a>
                        <span class="vertical-date">
                            Today <br>
                            <small>Dec 24</small>
                        </span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon blue-bg">
                        <i class="fa fa-file-text"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Send documents to Mike</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                        <a href="#" class="btn btn-sm btn-success"> Download document </a>
                        <span class="vertical-date">
                            Today <br>
                            <small>Dec 24</small>
                        </span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon lazur-bg">
                        <i class="fa fa-coffee"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Coffee Break</h2>
                        <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                        <a href="#" class="btn btn-sm btn-info">Read more</a>
                        <span class="vertical-date"> Yesterday <br><small>Dec 23</small></span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon yellow-bg">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Phone with Jeronimo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                        <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                    </div>
                </div>

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon navy-bg">
                        <i class="fa fa-comments"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Chat with Monica and Sandra</h2>
                        <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                        <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function() {


        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });


    });

    $('#profile_pic').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            let img = ' <img alt="image" class="rounded-circle circle-border m-b-md" src="' + e.target.result + '" />'
            $('.avatar_holder').html(img);
            $('#saveProfilePic').removeClass('d-none');
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#profilePicForm').submit(function(event) {

        event.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{  url('admin/profile-pic-change') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.href = "{{route('admin.profile') }}"
            },
            error: function(reject) {
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });
</script>
@endsection