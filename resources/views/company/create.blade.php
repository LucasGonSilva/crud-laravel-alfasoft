@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Cadastrar Empresa</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('company.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <form id="multiStepForm" action="{{ route('company.store') }}" method="POST">
                @csrf
        
                <!-- Step 1: Informações Básicas -->
                <div class="step step-1">
                    <h3>Informações Básicas</h3>
                    <div class="mb-3">
                        <label>Nome da Empresa</label>
                        <input type="text" name="name" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <div class="mb-3">
                        <label>CNPJ</label>
                        <input type="text" name="registration_number" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <button type="button" class="btn btn-primary next">Próximo</button>
                </div>
        
                <!-- Step 2: Contato -->
                <div class="step step-2 d-none">
                    <h3>Contato</h3>
                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="text" name="phone" class="form-control required">
                        <small class="text-danger error-message"></small>
                    </div>
                    <div class="mb-3">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control">
                    </div>
                    <button type="button" class="btn btn-secondary prev">Voltar</button>
                    <button type="button" class="btn btn-primary next">Próximo</button>
                </div>
        
                <!-- Step 3: Endereço -->
                <div class="step step-3 d-none">
                    <h3>Endereço</h3>
                    <div class="mb-3">
                        <label>Endereço</label>
                        <input type="text" name="address" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <div class="mb-3">
                        <label>Cidade</label>
                        <input type="text" name="city" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <div class="mb-3">
                        <label>Estado</label>
                        <input type="text" name="state" class="form-control required" required>
                        <small class="text-danger error-message"></small>
                    </div>
                    <button type="button" class="btn btn-secondary prev">Voltar</button>
                    <button type="submit" class="btn btn-success">Finalizar</button>
                </div>
            </form>
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let currentStep = 1;
                const steps = document.querySelectorAll(".step");
        
                function showStep(step) {
                    steps.forEach((s, index) => {
                        s.classList.toggle("d-none", index !== step - 1);
                    });
                }
        
                function validateStep(step) {
                    let valid = true;
                    let inputs = document.querySelectorAll(`.step-${step} .required`);
        
                    inputs.forEach(input => {
                        let errorMessage = input.nextElementSibling;
                        if (!input.value.trim()) {
                            errorMessage.textContent = "Este campo é obrigatório";
                            valid = false;
                        } else {
                            errorMessage.textContent = "";
                        }
                    });
        
                    return valid;
                }
        
                document.querySelectorAll(".next").forEach(button => {
                    button.addEventListener("click", function () {
                        if (validateStep(currentStep)) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    });
                });
        
                document.querySelectorAll(".prev").forEach(button => {
                    button.addEventListener("click", function () {
                        currentStep--;
                        showStep(currentStep);
                    });
                });
        
                showStep(currentStep);
            });
        </script>
        </div>
    </div>
@endsection
