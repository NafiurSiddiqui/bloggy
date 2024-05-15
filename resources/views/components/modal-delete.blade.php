 @props(['type' => '', 'message', 'form-id' => ''])


 <x-modal name="confirm-delete">
     <p>{{ $message ?? "You sure want to delete the  $type" }} </p>
     <div class="flex justify-end items-center space-x-3">
         <x-secondary-button class="mt-4" @click="$dispatch('close-modal','confirm-delete')">
             {{ 'Cancel' }}
         </x-secondary-button>
         <x-danger-button submit form-id="{{ $formId ?? 'form-delete' }}" class="mt-4 py-1" />
     </div>
 </x-modal>
