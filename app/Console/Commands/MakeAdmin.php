<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage admin users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        do {
            $choice = $this->choice(
                "What would you like to do?",
                ['Create Admin', 'List Admins', 'Select and Edit Admin', 'Delete Admin', 'Exit'],
                4  // Default option is Exit
            );

            switch ($choice) {
                case 'Create Admin':
                    $this->createAdmin();
                    break;

                case 'List Admins':
                    $this->listAdmins();
                    break;

                case 'Select and Edit Admin':
                    $this->selectAndEditAdmin();
                    break;

                case 'Delete Admin':
                    $this->deleteAdmin();
                    break;

                case 'Exit':
                    $this->info('Exiting the admin management system.');
                    return;  // Exit the command
            }

            $this->info("Click 'Enter' to go back to the main menu.");
            $this->ask('Press Enter to continue...');
            
        } while (true);
    }

    /**
     * Create a new admin user.
     */
    private function createAdmin()
    {
        $this->info("Let's create a new admin user!");

        $username = $this->askWithValidation('Enter a unique username', function ($input) {
            if (empty($input)) {
                return 'Username is required.';
            }
            if (User::where('username', $input)->exists()) {
                return 'This username is already taken.';
            }
            return true;
        });

        $fullname = $this->askWithValidation('Enter the full name', function ($input) {
            return empty($input) ? 'Full name is required.' : true;
        });

        $email = $this->askWithValidation('Enter a unique email address', function ($input) {
            if (empty($input)) {
                return 'Email is required.';
            }
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                return 'Invalid email format.';
            }
            if (User::where('email', $input)->exists()) {
                return 'This email is already registered.';
            }
            return true;
        });

        $password = $this->askWithValidation('Enter a password (min 5 characters)', function ($input) {
            return strlen($input) < 5 ? 'Password must be at least 5 characters long.' : true;
        }, true);

        if (!$this->confirm("Would you like to confirm creating an admin account with the info provided?", true)) {
            $this->info("Admin creation canceled.");
            return;
        }

        $admin = User::create([
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'password' => Hash::make($password),
            'isAdmin' => true,
        ]);

        $this->info("Admin user {$admin->username} created successfully!");
    }

    /**
     * List all admin users.
     */
    private function listAdmins()
    {
        $admins = User::where('isAdmin', true)->get(['id', 'username', 'fullname', 'email']);

        if ($admins->isEmpty()) {
            $this->info('No admin users found.');
            return;
        }

        $this->table(['ID', 'Username', 'Full Name', 'Email'], $admins);
    }

    /**
     * Select and edit an admin user.
     */
    private function selectAndEditAdmin()
    {
        $admins = User::where('isAdmin', true)->get(['id', 'username', 'fullname', 'email']);
        if ($admins->isEmpty()) {
            $this->info('No admin users found.');
            return;
        }

        $choices = $admins->mapWithKeys(function ($admin) {
            return [$admin->id => $admin->fullname];
        });

        $userId = $this->choice(
            'Select an admin to edit (by full name)',
            $choices->values()->toArray(),
            0
        );

        $admin = $admins->firstWhere('fullname', $userId);

        if (!$admin) {
            $this->error('Admin not found.');
            return;
        }

        $this->info("Editing admin: {$admin->username}");

        $fieldChoice = $this->choice(
            'Which field would you like to update?',
            ['username', 'fullname', 'email', 'Cancel'],
            3
        );

        if ($fieldChoice === 'Cancel') {
            $this->info("No updates made.");
            return;
        }

        $newValue = $this->ask("Update {$fieldChoice} (Current: {$admin->$fieldChoice})") ?: $admin->$fieldChoice;

        $admin->$fieldChoice = $newValue;

        $admin->save();

        $this->info("Admin user {$admin->username}'s {$fieldChoice} updated successfully.");
    }

    /**
     * Delete an admin user.
     */
    private function deleteAdmin()
    {
        $admins = User::where('isAdmin', true)->get(['id', 'username', 'fullname']);
        if ($admins->isEmpty()) {
            $this->info('No admin users found.');
            return;
        }

        $choices = $admins->mapWithKeys(function ($admin) {
            return [$admin->fullname . " ({$admin->username})" => $admin->id];
        });

        $selectedName = $this->choice(
            'Select an admin to delete (by full name)',
            $choices->keys()->toArray(),
            0
        );

        $userId = $choices->get($selectedName);
        $admin = User::findOrFail($userId);

        if ($this->confirm("Are you sure you want to delete admin user {$admin->username}?", false)) {
            $admin->delete();
            $this->info("Admin user {$admin->username} deleted successfully.");
        } else {
            $this->info("Deletion canceled.");
        }
    }

    /**
     * Ask a question with validation.
     *
     * @param string $question
     * @param callable $validation
     * @param bool $isSecret
     * @return mixed
     */
    private function askWithValidation(string $question, callable $validation, bool $isSecret = false)
    {
        do {
            $input = $isSecret ? $this->secret($question) : $this->ask($question);
            $validationResult = $validation($input);

            if ($validationResult === true) {
                return $input;
            }

            $this->error($validationResult);
        } while (true);
    }
}
