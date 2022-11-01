::loop
	
	:: Navigate to the directory you wish to push to GitHub
	::Change <path> as needed. Eg. C:\Users\sajid\Desktop\automatic_push_code_to_github\test2
	cd C:\Users\sajid\Desktop\automatic_push_code_to_github\test2
	
	::Pull any external changes (maybe you deleted a file from your repo?)
	::git pull origin master
	
	::Add all files in the directory
	git add .
	
	::Commit all changes with the message "auto push". 
	::Change as needed.
	git commit -m "auto pushed"

	::Push all changes to GitHub 
	git push origin master
	
	::Alert user to script completion and relaunch.
	echo Completed. Relaunching...
	
	::Wait 300 seconds until going to the start of the loop.
	::Change as needed.
	TIMEOUT 50
	EXIT
	
::Restart from the top.	
::goto loop
