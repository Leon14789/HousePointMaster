<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="{{ $id }}"> {{ $title }} </h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-4">
      {{ $slot }}
      </div>
    </div>
  </div>
</div> 