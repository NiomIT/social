@extends('frontend.master')
@section('main')
@php
$posts = App\Models\Post::with(['user', 'comments.user', 'comments.replies.user'])->get();
@endphp
<div class="row newsfeed-right-side-content mt-3">
<div class="col-md-8 second-section   mx-auto" id="page-content-wrapper">
   <ul class="list-unstyled" style="margin-bottom: 0;">
      <li class="media post-form w-shadow">
         <div class="media-body bg-light">
            <div class="form-group post-input">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <select name="" id="" class="form-control">
                           <option value="">- Location-</option>
                           <option value="1">Dhaka</option>
                           <option value="2">Rajshahi</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <select name="" id="" class="form-control">
                           <option value="">- Category -</option>
                           <option value="1">Education</option>
                           <option value="2">Food</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <select name="" id="" class="form-control">
                           <option value="">- Subcategory -</option>
                           <option value="1">Book</option>
                           <option value="2">Pen</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
   </ul>
   <!-- Posts -->
   <div class="posts-section mb-5">
   @foreach ($posts as $post)
   <div class="post border-bottom p-3 bg-white w-shadow" id="post-{{ $post->id }}">
   <div class="media text-muted pt-3">
   <img src="{{ asset($post->user->photo) }}" alt="Online user" class="mr-3 post-user-image">
   <div class="media-body pb-3 mb-0 small lh-125">
   <div class="d-flex justify-content-between align-items-center w-100">
   <a href="#" class="text-gray-dark post-user-name">{{ $post->user->name ?? 'n/a' }}</a>
   <div class="dropdown">
   <a href="#" class="post-more-settings" role="button" data-toggle="dropdown"
      id="postOptions" aria-haspopup="true" aria-expanded="false">
   <i class='bx bx-dots-horizontal-rounded'></i>
   </a>
   <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left post-dropdown-menu">
   <a href="#" class="dropdown-item" aria-describedby="savePost">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-bookmark-plus post-option-icon'></i>
   </div>
   <div class="col-md-10">
   <span class="fs-9">Edit post</span>
   <small id="savePost" class="form-text text-muted">Add this to your saved items</small>
   </div>
   </div>
   </a>
   <a href="#" class="dropdown-item" aria-describedby="hidePost">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-hide post-option-icon'></i>
   </div>
   <div class="col-md-10">
   <span class="fs-9">Delete post</span>
   <small id="hidePost" class="form-text text-muted">See fewer posts like this</small>
   </div>
   </div>
   </a>
   <a href="#" class="dropdown-item" aria-describedby="reportPost">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-block post-option-icon'></i>
   </div>
   <div class="col-md-10">
   <span class="fs-9">Report</span>
   <small id="reportPost" class="form-text text-muted">I'm concerned about this post</small>
   </div>
   </div>
   </a>
   </div>
   </div>
   </div>
   <span class="d-block">{{ $post->created_at->diffForHumans() }}<i class='bx bx-globe ml-3'></i></span>
   </div>
   </div>
   <div class="mt-3">
   <p>{{ $post->post_title }}</p>
   </div>
   <div class="d-block mt-3">
   <img src="{{ asset($post->post_thambnail) }}" class="post-content" alt="post image" style="height:400px;">
   </div>
   <div class="mb-3">
 <!-- Reactions -->
<div class="argon-reaction">
    <span class="like-btn">
        <a href="#" class="post-card-buttons" id="like-btn-{{ $post->id }}" data-post-id="{{ $post->id }}" data-user-id="{{ auth()->user()->id }}">
            <i class='bx bxs-like mr-2'></i>
            <span id="like-count-{{ $post->id }}">{{ $post->likes->count() }}</span>
        </a>
    </span>
</div>
<div class="argon-reaction">
    <span class="dislike-btn">
        <a href="#" class="post-card-buttons" id="dislike-btn-{{ $post->id }}" data-post-id="{{ $post->id }}" data-user-id="{{ auth()->user()->id }}">
            <i class='bx bxs-dislike mr-2'></i>
            <span id="dislike-count-{{ $post->id }}">{{ $post->dislikes->count() }}</span>
        </a>
    </span>
</div>
   <a href="javascript:void(0)" class="post-card-buttons" data-toggle="collapse" data-target="#comments-{{ $post->id }}">
   <i class='bx bx-message-rounded mr-2'></i>  {{ $post->comments->count() }}
   </a>
   <div class="dropdown dropup share-dropup">
   <a href="#" class="post-card-buttons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class='bx bx-share-alt mr-2'></i> Share
   </a>
   <div class="dropdown-menu post-dropdown-menu">
   <a href="#" class="dropdown-item">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-share-alt'></i>
   </div>
   <div class="col-md-10">
   <span>Share Now (Public)</span>
   </div>
   </div>
   </a>
   <a href="#" class="dropdown-item">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-share-alt'></i>
   </div>
   <div class="col-md-10">
   <span>Share...</span>
   </div>
   </div>
   </a>
   <a href="#" class="dropdown-item">
   <div class="row">
   <div class="col-md-2">
   <i class='bx bx-message'></i>
   </div>
   <div class="col-md-10">
   <span>Send as Message</span>
   </div>
   </div>
   </a>
   </div>
   </div>
   </div>
   <div class="collapse border-top pt-3 hide-comments" id="comments-{{ $post->id }}">
   <div class="row bootstrap snippets">
   <div class="col-md-12">
   <div class="comment-wrapper">
   <div class="panel panel-info">
   <div class="panel-body">
   <ul class="media-list comments-list">
   <li class="media comment-form">
   <a href="#" class="pull-left">
 
   </a>
   <div class="media-body">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   @if(auth()->check())
   <!-- Logged-in users can see the comment form -->
   <form action="{{ route('comment.store') }}" method="POST" role="form" id="comment-form">
   @csrf
   <input type="hidden" name="post_id" value="{{ $post->id }}">
   <div class="row">
   <div class="col-md-12">
   <div class="input-group">
   <input type="text" class="form-control comment-input" name="comment_text" placeholder="Write a comment...">
   <div class="input-group-btn">
   <button type="submit" class="btn comment-form-btn">
   <i class='bx bx-send'></i> 
   </button>
   </div>
   </div>
   </div>
   </div>
   </form>
   @else
   <!-- If user is not logged in, show a message with login link -->
   <p>Please <a href="{{ route('login') }}">log in</a> to comment.</p>
   @endif
   </div>
   </li>
@foreach($post->comments as $comment)
   <li class="media">
      <a href="#" class="pull-left">
         <!-- Show User Profile Picture -->
         <img src="{{ asset($comment->user->photo) }}" alt="" class="img-circle">
      </a>
      <div class="media-body">
         <strong>{{ $comment->user->name }}</strong>
         <span>{{ $comment->created_at->diffForHumans() }}</span>
         <p>{{ $comment->comment_text }}</p>
         <!-- Like & Reply Buttons -->
         <button type="button" class="btn btn-link fs-8" onclick="likeComment({{ $comment->id }})">Like</button>
         <button type="button" class="btn btn-link fs-8" data-toggle="collapse" data-target="#replyForm{{ $comment->id }}">Reply</button>

         <!-- Reply Form -->
         <div id="replyForm{{ $comment->id }}" class="collapse mt-3">
            @if(auth()->check())
               <form action="{{ route('comments.reply') }}" method="POST" class="reply-form">
                  @csrf
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                  <div class="input-group">
                     <input type="text" class="form-control comment-input" name="reply_text" placeholder="Write a reply...">
                     <div class="input-group-btn">
                        <button type="submit" class="btn comment-form-btn">
                           <i class='bx bx-send'></i> 
                        </button>
                     </div>
                  </div>
               </form>
            @else
               <p class="text-muted">Please <a href="{{ route('login') }}">login</a> to reply.</p>
            @endif
         </div>

         <!-- Display Replies -->
         @foreach($comment->replies as $reply)
         <div class="media mt-3">
            <a href="#" class="pull-left">
               <!-- Show User Profile Picture for Reply -->
               <img src="{{ asset($reply->user->photo) }}" alt="" class="img-circle">
            </a>
            <div class="media-body">
               <strong>{{ $reply->user->name }}</strong>
               <span>{{ $reply->created_at->diffForHumans() }}</span>
               <p>{{ $reply->reply_text }}</p>
            </div>
         </div>
         @endforeach
      </div>
   </li>
@endforeach

   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   @endforeach
   </div>
   </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
   const commentButtons = document.querySelectorAll('.post-card-buttons');
   
   commentButtons.forEach(button => {
   button.addEventListener('click', function (e) {
       e.preventDefault();
       
       const postId = button.closest('.post').getAttribute('data-post-id'); // Get post ID dynamically
   
       // Hide all comment sections
       document.querySelectorAll('.comment-section').forEach(section => {
           section.style.display = 'none';
       });
   
       // Show the clicked post's comment section
       const commentSection = document.getElementById(`comment-section-${postId}`);
       if (commentSection) {
           commentSection.style.display = 'block';
       }
   });
   });
   });
   
</script>
<script>
   // Like a comment
   $(document).on('click', '.like-comment', function (e) {
   e.preventDefault();
   var comment_id = $(this).data('comment-id');
   $.ajax({
   url: '/comment/like',
   method: 'POST',
   data: {comment_id: comment_id, _token: $('meta[name="csrf-token"]').attr('content')},
   success: function (response) {
       // Update UI based on response
   }
   });
   });
   
   // Dislike a comment
   $(document).on('click', '.dislike-comment', function (e) {
   e.preventDefault();
   var comment_id = $(this).data('comment-id');
   $.ajax({
   url: '/comment/dislike',
   method: 'POST',
   data: {comment_id: comment_id, _token: $('meta[name="csrf-token"]').attr('content')},
   success: function (response) {
       // Update UI based on response
   }
   });
   });
</script>
<script>
   $(document).on('click', '.like-button', function() {
   var user_id = $(this).data('user-id');
   var post_id = $(this).data('post-id');
   
   $.ajax({
       url: '/like',
       type: 'POST',
       data: { user_id: user_id, post_id: post_id },
       success: function(response) {
           // Update the like count
           $('#like-count-' + post_id).text(response.like_count);
       }
   });
   });
   
   $(document).on('submit', '.comment-form', function(e) {
   e.preventDefault();
   var user_id = $(this).find('.user-id').val();
   var post_id = $(this).find('.post-id').val();
   var comment_text = $(this).find('.comment-text').val();
   
   $.ajax({
       url: '/comment',
       type: 'POST',
       data: { user_id: user_id, post_id: post_id, comment_text: comment_text },
       success: function(response) {
           // Add the comment dynamically
           $('#comments-' + post_id).append('<p>' + response.comment_text + '</p>');
       }
   });
   });
   
   
</script>
<script>
   $(document).on('submit', '#comment-form', function(e) {
   e.preventDefault(); // ফর্মের ডিফল্ট সাবমিট প্রতিরোধ
   
   var formData = new FormData(this); // ফর্মের ডেটা নিয়ে আসুন
   
   $.ajax({
       url: '/comment', // কন্ট্রোলারের URL
       type: 'POST',
       data: formData,
       processData: false,
       contentType: false,
       success: function(response) {
           // সফলভাবে কমেন্ট সেভ হলে
           if(response.success) {
               // কমেন্ট UI তে অ্যাড করুন
               $('#comments-list').append('<div class="comment-item">' +
                   '<p>' + response.comment_text + '</p>' +
                   '<small>By: ' + response.user_name + '</small>' +
                   '</div>');
   
               // ফর্মটি ক্লিয়ার করুন
               $('#comment-form')[0].reset();
           }
       },
       error: function(error) {
           console.log(error);
       }
   });
   });
   
</script>
@endsection