Deployment Plan
---------------------
1. If you are merging a fully tested development or feature branch into master, otherwise skip to number 2.
  1. $ git checkout master
  2. $ git pull github master | resolve any conflicts
  3. $ git merge **_branchName_** | resolve any conflicts
  4. $ git push github master
2. $git push stagingServer master
3. Test new feature on staging sever thoroughly.
4. $git push productionServer master
5. Test new feature again, if all is well announce update.
 