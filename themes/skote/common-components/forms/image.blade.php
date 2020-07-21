<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        <div class="thumbnail-image-preview {{ $field }}">
            @foreach($oldValue as $id => $url)
                <div class="thumbnail-image-box image-choice-child {{ $field }}">
                    <img class="thumbnail-image-img {{ $field }}"
                         src="{{ url($url) }}" height="100">
                </div>
            @endforeach
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend input-group-upload">
                <button type="button" class="btn btn-primary btn-upload btn-upload-image-{{ $field }}">
                    {{ __('image::labels.upload') }}
                </button>
            </div>
            <input type="file" name="{{ $field . '_upload' }}[]" class="form-control input-upload-image-{{ $field }}"
                   accept="image/*" aria-label="Amount (to the nearest dollar)" {{ @$multiple }}>
            <input type="hidden" name="{{ $field . '_choice' }}" value="{{ implode(',', array_keys($oldValue)) }}">
            <div class="input-group-append" data-toggle="modal" data-target=".bd-modal-lg-{{ $field }}">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-modal-lg-{{ $field }}">
                    {{ __('image::labels.choose') }}
                </button>
            </div>
        </div>

        <div class="modal fade bd-modal-lg-{{ $field }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="thumbnail-image-modal {{ $field }}">
                        @if (count($thumbnails))
                            @foreach($thumbnails as $id => $thumbnail)
                                <div class="thumbnail-image-box thumbnail-image-box-choice {{ $field }} @if(array_key_exists($id, $oldValue)) image-choice @endif">
                                    <img class="thumbnail-image-img {{ $field }}"
                                         src="{{ url($thumbnail) }}"
                                         height="100" id-image="{{ $id }}">
                                    <i class="bx bxs-circle mr-2 choice-icon"></i>
                                </div>
                            @endforeach
                        @else
                            <p>{{ __('image::labels.no_file') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('script-extra')
    <script>
      $(document).ready(function () {

        function choiceImage () {

          $(`.image-choice-child.{{ $field }}`).remove()
          $(`input[name='{{ $field . '_choice' }}']`).val([])

          let choiceIds = []
          $('.image-choice.{{ $field }}').each(function () {
            $(`.thumbnail-image-preview.{{ $field }}`).prepend(
              `<div class="thumbnail-image-box image-choice-child {{ $field }}">
                  <img class="thumbnail-image-img {{ $field }}" src="${$(this).find('img.thumbnail-image-img').attr('src')}" height="100">
              </div>`)
            choiceIds.push($(this).find('img.thumbnail-image-img').attr('id-image'))
          })
          $(`input[name='{{ $field . '_choice' }}']`).val(choiceIds)
        }

        function uploadImage (input) {
          if (input.files) {
            let filesAmount = input.files.length

            for (i = 0; i < filesAmount; i++) {
              let reader = new FileReader()

              reader.onload = function (e) {
                $(`.thumbnail-image-preview.{{ $field }}`).prepend(
                  `<div class="thumbnail-image-box image-upload-child {{ $field }}">
                  <img class="thumbnail-image-img {{ $field }}" src="${e.target.result}" height="100">
              </div>`)
              }

              let a = (input.files[i].size)
              if (a > 2000000) {
                alert(`Your image "${input.files[i].name}" you upload too large, maximum 2mb`)
                $('.input-upload-image-{{ $field }}').val('')
                break
              }

              reader.readAsDataURL(input.files[i])
            }
          }
        }

        $(document).on('change', '.input-upload-image-{{ $field }}', function () {
          $(`.image-upload-child.{{ $field }}`).remove()

          if ('{{ @$multiple }}' !== 'multiple') {
            $('.thumbnail-image-box-choice.{{ $field }}').removeClass('image-choice')
            $(`.thumbnail-image-preview.{{ $field }}`).empty()
            $(`input[name='{{ $field . '_choice' }}']`).val([])
          }

          uploadImage(this)
        })

        $(document).on('click', '.btn-upload-image-{{ $field }}', function () {
          $('.input-upload-image-{{ $field }}').click()
        })

        $(document).on('click', '.thumbnail-image-box-choice.{{ $field }}', function () {

          if ('{{ @$multiple }}' !== 'multiple') {
            $('.thumbnail-image-box-choice.{{ $field }}').removeClass('image-choice')
            $(`.thumbnail-image-preview.{{ $field }}`).empty()
            $(`input[name='{{ $field . '_choice' }}']`).val([])
          }

          $(this).toggleClass('image-choice')
          choiceImage()
        })

      })
    </script>
@endpush

@push('css-extra')
    <style>
        .thumbnail-image-box {
            position: relative;
        }

        .thumbnail-image-box .choice-icon {
            position: absolute;
            font-size: 25px;
            top: 0;
            right: -10px;
            color: #58fb58;
            display: none;
        }

        .input-group-upload {
            position: absolute
        }

        .btn-upload {
            width: 110px
        }

        .thumbnail-image-modal {
            width: 100%;
            height: 100%;
        }

        .thumbnail-image-box {
            float: left;
            margin: 10px;
            width: max-content;
        }

        .image-choice .choice-icon {
            display: block;
        }

        .image-choice img {
            border-radius: 10px;
        }

    </style>
@endpush

