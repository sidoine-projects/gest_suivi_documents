<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">

    <form wire:submit.prevent="submit" method="POST" class="flex flex-col php-email-form" role="form">

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row ">
            <div class="col form-group mt-3">
                <input type="text" wire:model="name" name="name" class="form-control" id="name"  autocomplete="on" 
                    placeholder="Nom & prénom" required>
                    @error('name') <span class="mt-1 ml-1 text-sm text-red-700">{{ $message }}</span> @enderror

            </div>
            
            <div class="col form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" wire:model="email" placeholder=" Email" autocomplete="on" 
                    required>
                    @error('email') <span class="mt-1 ml-1 text-sm text-red-700">{{ $message }}</span> @enderror

            </div>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" wire:model="subject" name="subject" id="subject" placeholder="Subject"
                required>
                @error('subject') <span class="mt-1 ml-1 text-sm text-red-700">{{ $message }}</span> @enderror

        </div>
        
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" wire:model="message" placeholder="Message" required></textarea>
        </div>

        <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div wire:loading>
           Envoie en cours...
        </div>
        <div class="text-center"><button type="submit" class="">ENVOYER</button></div>



    </form>
</div>


