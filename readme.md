## [Larabook - Laracasts Series][1]

### [Laracasts][4]
I've been following along the Laracasts ["Build Larabook from scratch series"][3]. I've posted my code here for anyone who gets stuck.

### Progress
The codebase is currently at lession 28.

### Setup
1) Install [Vagrant][1] and [VirtualBox][2]
2) Clone this repository
3) Open a terminal in the cloned directory
4) Run 'vagrant up'
5) Add '192.168.10.10 larabook.app' to your hosts file
6) Open your browser and load 'http://larabook.app'

### Tests
1) ssh into the VM by running the 'vagrant ssh' command from the root directory of the project
2) cd to '/vagrant'
3) Run 'vendor/bin/codecept run'

### Development
1) ssh into the VM. The easiest way is to run the 'vagrant ssh' command from the root directory of the project
2) Run the 'gulp' command to compile the css

  [1]: http://downloads.vagrantup.com/  
  [2]: https://www.virtualbox.org/wiki/Downloads  
  [3]: https://laracasts.com/series/build-a-laravel-app-from-scratch
  [4]: https://laracasts.com/
