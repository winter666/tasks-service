<div class="container">
    <div id="accordion">
        <div class="card current">
            <div class="card-header" id="currentTasks">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Current: <span>(count)</span>
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="currentTasks" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Название карточки</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-primary">current</span></h6>
                            <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="/app/handlers/taskHandler.php" id="passCheckWork">
                                <input type="success" class="btn btn-primary btn-sm" value="Pass for check">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <div class="card comleted">
            <div class="card-header" id="comletedTasks">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsTwo" aria-expanded="true" aria-controls="collapsTwo">
                        Completed: <span>(count)</span>
                    </button>
                </h5>
                </div>

                <div id="collapsTwo" class="collapse" aria-labelledby="comletedTasks" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Название карточки</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-success">completed</span></h6>
                            <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <!-- <form method="POST" action="/app/handlers/taskHandler.php" id="passCheckWork">
                                <input type="success" class="btn btn-primary btn-sm" value="Pass for check">
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card failedTasks">
            <div class="card-header" id="failedTasks">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                        Failed: <span>(count)</span>
                    </button>
                </h5>
                </div>

                <div id="collapseTree" class="collapse" aria-labelledby="failedTasks" data-parent="#accordion">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Название карточки</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Status: <span class="badge badge-danger">failed</span></h6>
                            <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <!-- <form method="POST" action="/app/handlers/taskHandler.php" id="passCheckWork">
                                <input type="success" class="btn btn-primary btn-sm" value="Pass for check">
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>