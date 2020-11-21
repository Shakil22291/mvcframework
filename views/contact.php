<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-2">
            <h3 class="dispaly-3">contact with <?= $name ?></h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input 
                        type="text" 
                        name="subject" 
                        class="form-control" 
                        id="subject"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        id="email"
                    >
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea 
                        class="form-control" 
                        name="body" 
                        id="body"
                    ></textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>