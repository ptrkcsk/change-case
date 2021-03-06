linux = Linux
macOs = Darwin
os = $(shell uname)
phpunit = vendor/bin/phpunit

########################################################################
# Standard targets
# See https://www.gnu.org/software/make/manual/html_node/Standard-Targets.html
########################################################################

.PHONY : all
all : ;

.PHONY : clean
clean :
	@$(RM) cc-test-reporter
	@$(RM) clover.xml
	@$(RM) composer.phar
	@$(RM) -r docs
	@$(RM) -r tests/coverage
	@$(RM) -r vendor

########################################################################
# Phony targets
########################################################################

.PHONY : test
test : $(phpunit) ; $<

.PHONY : test-coverage-code-climate
test-coverage-code-climate : clean cc-test-reporter clover.xml
	@./cc-test-reporter before-build
	@./cc-test-reporter after-build --coverage-input-type clover

.PHONY : test-coverage-html
test-coverage-html : $(phpunit)
	$< --coverage-html tests/coverage
ifeq ($(os), $(macOs))
	open tests/coverage/index.html
endif

########################################################################
# Real targets
########################################################################

cc-test-reporter :
ifeq ($(os), $(linux))
	@curl -L https://codeclimate.com/downloads/test-reporter/test-reporter-latest-linux-amd64 > ./cc-test-reporter
else ifeq ($(os), $(macOs))
	@curl -L https://codeclimate.com/downloads/test-reporter/test-reporter-latest-darwin-amd64 > ./cc-test-reporter
else
	$(error Operating system '$(os)' not supported)
endif
	@chmod +x cc-test-reporter

clover.xml : $(phpunit) ; $< --coverage-clover clover.xml

composer.phar :
	@php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	@php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
	@php composer-setup.php
	@php -r "unlink('composer-setup.php');"

docs : vendor/bin/phpdoc ; $<

vendor/% : composer.phar ; @php composer.phar install
