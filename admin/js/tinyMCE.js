if (window.location.pathname === '/admin/posts.php') {
  tinymce.init({
    selector: 'textarea',
    images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', './includes/postAcceptor.php');

      xhr.onload = function () {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.location);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    },
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JSX', value: 'jsx'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
    ],
    plugins: 'codesample emoticons image lists  wordcount',
    toolbar: 'emoticons numlist bullist codesample image code insertfile table wordcount',
    content_css: [
      "https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/themes/prism-tomorrow.min.css",
      "https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/plugins/line-numbers/prism-line-numbers.css",
  ],
    toolbar_drawer: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
  });
}
